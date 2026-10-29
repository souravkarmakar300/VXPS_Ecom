<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_about_page_returns_a_successful_response(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('About Us');
        $response->assertSee('Our Philosophy');
        $response->assertSee('Let Our Clients Certify Us');
    }

    public function test_the_contact_page_returns_a_successful_response(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Stay in Touch with us');
        $response->assertSee('+61 426 762 285');
        $response->assertSee('anthonyh@vxpowertech.com');
        $response->assertSee('1D, Kyle Street, Glenside, Adelaide');
    }

    public function test_contact_form_can_be_submitted(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $response = $this->post('/contact', [
            'name' => 'Jane Citizen',
            'email' => 'jane@example.com',
            'phone' => '+61 400 123 456',
            'subject' => 'General Inquiry',
            'message' => 'Hello, I have an inquiry about the wireless charger.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'name' => 'Jane Citizen',
            'email' => 'jane@example.com',
            'subject' => 'General Inquiry',
        ]);

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\ContactInquiryReceived::class, 2);
    }

    public function test_the_shop_page_returns_a_successful_response(): void
    {
        \App\Models\Category::firstOrCreate(
            ['slug' => 'test-category'],
            ['name' => 'Test Category']
        );

        $response = $this->get('/shop');

        $response->assertStatus(200);
        $response->assertSee('All Products');
        $response->assertSee('Shop by Product');
        $response->assertSee('price-range-min');
        $response->assertSee('price-range-max');
        $response->assertSee('slider-highlight-bar');
    }

    public function test_the_shop_price_range_filtering(): void
    {
        $response = $this->get('/shop?min_price=50&max_price=200');

        $response->assertStatus(200);
        $response->assertSee('Price: $50');
    }

    public function test_api_categories_returns_json(): void
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
        $response->assertJson([]);
    }

    public function test_single_product_page_can_be_rendered(): void
    {
        $productWithDetails = \App\Models\Product::firstOrCreate(
            ['slug' => 'test-power-bank'],
            [
                'name' => 'Test Power Bank Pro',
                'description' => 'Test description',
                'features' => '<ul><li>Smart Fast Charge</li></ul>',
                'specification' => '<ul><li>Capacity: 10,000mAh</li></ul>',
                'price' => 79.99,
                'status' => 'active',
            ]
        );

        $response = $this->get('/product/' . $productWithDetails->slug);
        $response->assertStatus(200);
        $response->assertSee($productWithDetails->name);
        $response->assertSee('Total Product Details');
        $response->assertSee('Features');
        $response->assertSee('Specifications');

        // Test product without details does not show the tab section
        $productWithoutDetails = \App\Models\Product::firstOrCreate(
            ['slug' => 'test-plain-cable'],
            [
                'name' => 'Plain Cable',
                'description' => 'A plain cable',
                'features' => null,
                'specification' => null,
                'whats_include' => null,
                'compatibility' => null,
                'faq' => null,
                'price' => 19.99,
                'status' => 'active',
            ]
        );

        $responseNoDetails = $this->get('/product/' . $productWithoutDetails->slug);
        $responseNoDetails->assertStatus(200);
        $responseNoDetails->assertSee($productWithoutDetails->name);
        $responseNoDetails->assertDontSee('Total Product Details');
    }

    public function test_checkout_page_can_be_rendered(): void
    {
        $response = $this->get('/checkout');

        $response->assertStatus(200);
        $response->assertSee('Secure Checkout');
        $response->assertSee('Billing Details');
        $response->assertSee('Your Order');
        $response->assertSee('Place order');
    }

    public function test_checkout_direct_product_buy(): void
    {
        $product = \App\Models\Product::firstOrCreate(
            ['slug' => 'test-checkout-gadget'],
            [
                'name' => 'Fast MagSafe Hub',
                'description' => 'Fast charger',
                'price' => 89.99,
                'status' => 'active',
            ]
        );

        $response = $this->get('/checkout?product=' . $product->slug . '&qty=2');

        $response->assertStatus(200);
        $response->assertSee('Fast MagSafe Hub');
        $response->assertSee('Your Order');
    }

    public function test_checkout_order_placement_and_success_flow(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $product = \App\Models\Product::firstOrCreate(
            ['slug' => 'test-checkout-hub'],
            [
                'name' => 'USB-C Power Hub 100W',
                'description' => 'High speed power hub',
                'price' => 99.00,
                'status' => 'active',
            ]
        );

        // Put item in session cart
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => 99.00,
                'quantity' => 1,
                'image' => null,
                'category' => 'Hardware',
            ]
        ];

        $postData = [
            'customer_name' => 'John Citizen',
            'customer_email' => 'john.citizen@example.com.au',
            'customer_phone' => '0412 888 999',
            'shipping_address' => '1D Kyle Street',
            'shipping_city' => 'Glenside',
            'shipping_state' => 'SA',
            'shipping_postcode' => '5065',
            'shipping_country' => 'Australia',
            'shipping_method' => 'standard',
            'payment_method' => 'card',
            'notes' => 'Leave near door',
        ];

        $response = $this->withSession(['cart' => $cart])->post('/checkout', $postData);

        $this->assertDatabaseHas('orders', [
            'customer_email' => 'john.citizen@example.com.au',
            'customer_name' => 'John Citizen',
            'shipping_city' => 'Glenside',
            'shipping_state' => 'SA',
            'status' => 'confirmed',
        ]);

        $order = \App\Models\Order::where('customer_email', 'john.citizen@example.com.au')->latest()->first();
        $this->assertNotNull($order);

        $response->assertRedirect('/checkout/success/' . $order->order_number);

        // Check success page renders
        $successResponse = $this->get('/checkout/success/' . $order->order_number);
        $successResponse->assertStatus(200);
        $successResponse->assertSee($order->order_number);
        $successResponse->assertSee('Thank you for your order, John Citizen!');
        $successResponse->assertSee('Adelaide');

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\OrderConfirmationMail::class);
    }
}
