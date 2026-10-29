<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_postcode',
        'shipping_country',
        'shipping_method',
        'shipping_cost',
        'discount_amount',
        'discount_code',
        'payment_method',
        'payment_status',
        'stripe_payment_intent_id',
        'payment_reference',
        'total_amount',
        'status',
        'notes',
        'items',
    ];

    protected function casts(): array
    {
        return [
            'total_amount' => 'decimal:2',
            'shipping_cost' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'items' => 'array',
        ];
    }
}

