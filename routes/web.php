<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hasProducts = \Illuminate\Support\Facades\Schema::hasTable('products');

    if (! $hasProducts) {
        return view('welcome', ['products' => collect()]);
    }

    $regularProducts = \App\Models\Product::with('category')
        ->where('status', 'active')
        ->where(function ($query) {
            $query->whereNull('special_offer_price')
                ->orWhere('special_offer_price', '<=', 0);
        })
        ->latest()
        ->take(4)
        ->get()
        ->each(fn ($product) => $product->card_type = 'regular');

    $specialOfferProducts = \App\Models\Product::with('category')
        ->where('status', 'active')
        ->whereNotNull('special_offer_price')
        ->where('special_offer_price', '>', 0)
        ->latest()
        ->take(4)
        ->get()
        ->each(fn ($product) => $product->card_type = 'special');

    $newArrivalProducts = \App\Models\Product::with('category')
        ->where('status', 'active')
        ->latest('created_at')
        ->take(4)
        ->get()
        ->each(fn ($product) => $product->card_type = 'new');

    // Keep selection rules, merge uniquely (special > new > regular), then randomize order.
    $products = $specialOfferProducts
        ->concat($newArrivalProducts)
        ->concat($regularProducts)
        ->unique('id')
        ->shuffle()
        ->values();

    return view('welcome', compact('products'));
})->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('product.show');

// Checkout & Cart Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/cart/add', [CheckoutController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/quantity', [CheckoutController::class, 'updateQuantity'])->name('cart.quantity');
Route::get('/checkout/success/{order_number}', [CheckoutController::class, 'success'])->name('checkout.success');

// Stripe / Apple Pay / Card payment endpoints
Route::get('/payment/config', [PaymentController::class, 'config'])->name('payment.config');
Route::post('/payment/intent', [PaymentController::class, 'createIntent'])->name('payment.intent');
Route::post('/payment/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');

Route::get('/api/categories', function () {
    if (!\Illuminate\Support\Facades\Schema::hasTable('categories')) {
        return response()->json([]);
    }

    $categories = \App\Models\Category::withCount(['products' => fn ($q) => $q->where('status', 'active')])
        ->orderBy('name')
        ->get()
        ->map(function ($cat) {
            $slug = strtolower($cat->slug);
            $img = null;

            if ($cat->image) {
                $img = asset('storage/' . $cat->image);
            } elseif (str_contains($slug, 'charging') || str_contains($slug, 'power')) {
                $img = asset('images/categories/jump.png');
            } elseif (str_contains($slug, 'display') || str_contains($slug, 'tech')) {
                $img = asset('images/categories/discovery.png');
            } elseif (str_contains($slug, 'wearable') || str_contains($slug, 'watch')) {
                $img = asset('images/categories/infinity-luxe.png');
            } elseif (str_contains($slug, 'audio') || str_contains($slug, 'sound')) {
                $img = asset('images/categories/audio-sound.png');
            } elseif (str_contains($slug, 'gaming') || str_contains($slug, 'gear')) {
                $img = asset('images/categories/gaming-gear.png');
            } else {
                $img = asset('images/categories/jump.png');
            }

            return [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'image' => $img,
                'products_count' => (int) $cat->products_count,
                'url' => route('shop', ['category' => $cat->slug]),
            ];
        });

    return response()->json($categories);
})->name('api.categories');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/terms-and-conditions', function () {
    return view('Information.terms_conditions');
})->name('terms');

Route::get('/privacy-policy', function () {
    return view('Information.privacy_policy');
})->name('privacy');

Route::get('/return-policy', function () {
    return view('Information.return_policy');
})->name('returns');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Mail diagnostic test endpoint
Route::get('/test-mail', function (\Illuminate\Http\Request $request) {
    $to = $request->query('to', config('mail.from.address'));

    try {
        \Illuminate\Support\Facades\Mail::raw("This is a test email from VXPS Commerce Engine to verify your SMTP configuration.\n\nDispatched at: " . now()->toDateTimeString(), function ($message) use ($to) {
            $message->to($to)
                ->subject('VXPS SMTP Configuration Test: Success');
        });

        return response()->json([
            'success' => true,
            'message' => "Test email successfully dispatched to {$to} via " . config('mail.default'),
            'mailer' => config('mail.default'),
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'encryption' => config('mail.mailers.smtp.encryption'),
            'from' => config('mail.from.address'),
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'mailer' => config('mail.default'),
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'from' => config('mail.from.address'),
        ], 500);
    }
})->name('mail.test');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware(['admin.guest'])->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
        // Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('register');
        // Route::post('/register', [AdminAuthController::class, 'register'])->name('register.submit');
    });

    // Authenticated Admin Routes
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Customer Contacts & Inquiries
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.update-status');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    });
});
