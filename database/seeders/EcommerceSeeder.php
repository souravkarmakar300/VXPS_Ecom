<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EcommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Charging & Power', 'slug' => 'charging-power'],
            ['name' => 'Audio & Sound', 'slug' => 'audio-sound'],
            ['name' => 'Gaming & Gear', 'slug' => 'gaming-gear'],
            ['name' => 'Displays & Tech', 'slug' => 'displays-tech'],
            ['name' => 'Smart Wearables', 'slug' => 'smart-wearables'],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::firstOrCreate(
                ['slug' => $cat['slug']],
                ['name' => $cat['name']]
            );
        }

        $products = [
            ['name' => 'Wireless Noise-Canceling Headphones', 'price' => 199.99, 'special_offer_price' => 169.99, 'category_slug' => 'audio-sound'],
            ['name' => 'Mechanical Gaming Keyboard RGB', 'price' => 89.99, 'special_offer_price' => 74.99, 'category_slug' => 'gaming-gear'],
            ['name' => 'Ultra-Slim 4K Monitor 27"', 'price' => 349.50, 'special_offer_price' => null, 'category_slug' => 'displays-tech'],
            ['name' => 'Ergonomic Wireless Mouse', 'price' => 49.99, 'special_offer_price' => 39.99, 'category_slug' => 'gaming-gear'],
            ['name' => 'USB-C Multi-Port Hub Adapter', 'price' => 39.99, 'special_offer_price' => null, 'category_slug' => 'charging-power'],
            ['name' => 'Smart Fitness Smartwatch Pro', 'price' => 159.00, 'special_offer_price' => 129.00, 'category_slug' => 'smart-wearables'],
            ['name' => 'Aluminum Laptop Stand', 'price' => 29.99, 'special_offer_price' => 24.99, 'category_slug' => 'displays-tech'],
            ['name' => 'Fast Wireless Charging Pad 15W', 'price' => 24.50, 'special_offer_price' => null, 'category_slug' => 'charging-power'],
        ];

        foreach ($products as $item) {
            $catId = \App\Models\Category::where('slug', $item['category_slug'])->value('id');
            Product::updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'category_id' => $catId,
                    'name' => $item['name'],
                    'description' => 'High quality ' . $item['name'] . ' for VXPS eCommerce store.',
                    'price' => $item['price'],
                    'special_offer_price' => $item['special_offer_price'],
                    'status' => 'active',
                ]
            );
        }

        $orders = [
            [
                'order_number' => 'VXPS-1001',
                'customer_name' => 'Michael Scott',
                'customer_email' => 'michael@example.com',
                'total_amount' => 289.98,
                'status' => 'completed',
            ],
            [
                'order_number' => 'VXPS-1002',
                'customer_name' => 'Pam Beesly',
                'customer_email' => 'pam@example.com',
                'total_amount' => 159.00,
                'status' => 'processing',
            ],
            [
                'order_number' => 'VXPS-1003',
                'customer_name' => 'Jim Halpert',
                'customer_email' => 'jim@example.com',
                'total_amount' => 399.49,
                'status' => 'completed',
            ],
            [
                'order_number' => 'VXPS-1004',
                'customer_name' => 'Dwight Schrute',
                'customer_email' => 'dwight@example.com',
                'total_amount' => 64.49,
                'status' => 'pending',
            ],
        ];

        foreach ($orders as $order) {
            Order::firstOrCreate(
                ['order_number' => $order['order_number']],
                $order
            );
        }

        $contacts = [
            [
                'name' => 'Sarah Connor',
                'email' => 'sarah@example.com',
                'phone' => '+1 555-0199',
                'subject' => 'Bulk Product Inquiry',
                'message' => 'Looking to purchase 50 units of the wireless headphones for our office.',
                'status' => 'unread',
            ],
            [
                'name' => 'David Miller',
                'email' => 'david@example.com',
                'phone' => '+1 555-0144',
                'subject' => 'Shipping Question',
                'message' => 'Do you provide express international shipping to Canada?',
                'status' => 'read',
            ],
            [
                'name' => 'Emily Watson',
                'email' => 'emily@example.com',
                'phone' => '+1 555-0182',
                'subject' => 'Partnership Proposal',
                'message' => 'We would love to feature your electronics on our review blog.',
                'status' => 'unread',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::firstOrCreate(
                ['email' => $contact['email'], 'subject' => $contact['subject']],
                $contact
            );
        }
    }
}

