<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of all contact inquiries with filters and search.
     */
    public function index(Request $request): View
    {
        $status = $request->input('status', 'all');
        $query = $request->input('q');

        $contactsQuery = Contact::query()->latest();

        if ($status !== 'all' && in_array($status, ['unread', 'read', 'replied'], true)) {
            $contactsQuery->where('status', $status);
        }

        if (!empty($query)) {
            $contactsQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->orWhere('phone', 'like', "%{$query}%")
                    ->orWhere('subject', 'like', "%{$query}%")
                    ->orWhere('message', 'like', "%{$query}%");
            });
        }

        $contacts = $contactsQuery->paginate(15)->withQueryString();

        $counts = [
            'total' => Contact::count(),
            'unread' => Contact::where('status', 'unread')->count(),
            'read' => Contact::where('status', 'read')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'status', 'query', 'counts'));
    }

    /**
     * Display the specified contact inquiry details and mark as read.
     */
    public function show(Contact $contact): View
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Toggle or update the contact inquiry status.
     */
    public function updateStatus(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:unread,read,replied',
        ]);

        $contact->update(['status' => $validated['status']]);

        return back()->with('success', "Inquiry marked as {$validated['status']}.");
    }

    /**
     * Remove the specified contact inquiry from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $name = $contact->name;
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', "Inquiry from {$name} was deleted successfully.");
    }
}

