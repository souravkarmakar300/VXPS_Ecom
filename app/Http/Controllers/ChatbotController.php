<?php

namespace App\Http\Controllers;

use App\Models\ChatbotConversation;
use App\Models\ChatbotMessage;
use App\Services\OpenRouterChatService;
use App\Services\StoreCatalogContext;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\ConnectionException;
use Throwable;

class ChatbotController extends Controller
{
    public function history(Request $request): JsonResponse
    {
        $conversation = $this->currentConversation($request, create: false);

        if (! $conversation) {
            return response()->json(['messages' => []]);
        }

        $messages = $conversation->messages()
            ->orderByDesc('id')
            ->limit(30)
            ->get()
            ->sortBy('id')
            ->values()
            ->map(fn (ChatbotMessage $message) => [
                'role' => $message->role,
                'content' => $message->content,
                'products' => $message->role === 'assistant'
                    ? (array) ($message->meta['products'] ?? [])
                    : [],
            ]);

        return response()->json(['messages' => $messages]);
    }

    public function send(
        Request $request,
        StoreCatalogContext $catalog,
        OpenRouterChatService $openRouter
    ): JsonResponse {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1200'],
        ]);

        $userMessage = trim($validated['message']);

        if ($userMessage === '') {
            return response()->json([
                'message' => 'Please enter a message before sending.',
            ], 422);
        }

        $conversation = $this->currentConversation($request, create: true);

        $history = $conversation->messages()
            ->orderByDesc('id')
            ->limit(12)
            ->get()
            ->sortBy('id')
            ->values()
            ->map(fn (ChatbotMessage $message) => [
                'role' => $message->role,
                'content' => $message->content,
            ])
            ->all();

        $catalogProducts = $catalog->findProducts($userMessage);
        $catalogContext = $catalog->toPromptContext($catalogProducts);

        try {
            $aiResult = $openRouter->reply($userMessage, $history, $catalogContext);
        } catch (ConnectionException $exception) {
            Log::warning('VXPS chatbot connection to OpenRouter failed.', [
                'conversation_id' => $conversation->id,
                'exception' => $exception::class,
            ]);

            return response()->json([
                'message' => 'The AI assistant is temporarily unreachable. Please try again shortly.',
            ], 503);
        } catch (Throwable $exception) {
            Log::warning('VXPS chatbot could not answer.', [
                'conversation_id' => $conversation->id,
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            return response()->json([
                'message' => 'The AI assistant is not configured or is temporarily unavailable. Please try again shortly.',
            ], 503);
        }

        $reply = (string) ($aiResult['reply'] ?? 'I could not prepare a response. Please try again.');
        $requestedIds = (array) ($aiResult['product_ids'] ?? []);

        // Product cards are always assembled from real database records.
        $catalogCollection = collect($catalogProducts);
        $selectedProducts = $catalogCollection
            ->filter(fn (array $product) => in_array((int) $product['id'], $requestedIds, true));

        if ($this->isMultiProductRequest($userMessage)) {
            // For plural/list/recommendation requests, show up to six matching catalogue
            // products. The AI-selected products appear first; remaining database matches
            // fill the list so a model returning only one ID does not hide other matches.
            $selectedIds = $selectedProducts->pluck('id')->map(fn ($id) => (int) $id)->all();

            $productCards = $selectedProducts
                ->concat($catalogCollection->reject(
                    fn (array $product) => in_array((int) $product['id'], $selectedIds, true)
                ))
                ->unique('id')
                ->take(6)
                ->values()
                ->all();
        } else {
            // For a specific product/price question, show only products explicitly selected by the AI.
            $productCards = $selectedProducts
                ->take(6)
                ->values()
                ->all();

            // If a product-discovery request returned no IDs, show one real database match.
            if ($productCards === [] && $catalogProducts !== [] && $this->isProductDiscoveryRequest($userMessage)) {
                $productCards = array_slice($catalogProducts, 0, 1);
            }
        }

        DB::transaction(function () use ($conversation, $userMessage, $reply, $productCards) {
            $conversation->messages()->create([
                'role' => 'user',
                'content' => $userMessage,
            ]);

            $conversation->messages()->create([
                'role' => 'assistant',
                'content' => $reply,
                'meta' => ['products' => $productCards],
            ]);

            $conversation->update([
                'last_message_at' => now(),
            ]);
        });

        return response()->json([
            'reply' => $reply,
            'products' => $productCards,
        ]);
    }

    public function reset(Request $request): JsonResponse
    {
        // Keep old conversations in the database; the next message starts a new one.
        $request->session()->forget('vxps_chatbot_conversation_id');

        return response()->json(['success' => true]);
    }

    private function isMultiProductRequest(string $message): bool
    {
        return (bool) preg_match(
            '/\b(recommend|recommendations|suggest|suggestions|compare|alternatives|options|all|multiple|several|products|chargers|cables|adapters|monitors|headphones|speakers)\b|দেখাও|দেখান|সব|একাধিক|কয়েকটি|পণ্য|প্রোডাক্টগুলো|চার্জারগুলো|কেবলগুলো/u',
            mb_strtolower($message)
        );
    }

    private function isProductDiscoveryRequest(string $message): bool
    {
        return (bool) preg_match(
            '/\b(show|find|recommend|suggest|browse|product|products|charger|charging|price|compare|looking|available|wireless|category|camera|cable|adapter|monitor|headphone|speaker)\b|দেখাও|দাম|পণ্য|চার্জার|ক্যাটাগরি|প্রোডাক্ট/u',
            mb_strtolower($message)
        );
    }

    private function currentConversation(Request $request, bool $create): ?ChatbotConversation
    {
        $conversationId = $request->session()->get('vxps_chatbot_conversation_id');

        if ($conversationId) {
            $conversation = ChatbotConversation::query()->find($conversationId);

            if ($conversation) {
                return $conversation;
            }

            $request->session()->forget('vxps_chatbot_conversation_id');
        }

        if (! $create) {
            return null;
        }

        $conversation = ChatbotConversation::create([
            'user_id' => $request->user()?->getAuthIdentifier(),
        ]);

        $request->session()->put('vxps_chatbot_conversation_id', $conversation->id);

        return $conversation;
    }
}
