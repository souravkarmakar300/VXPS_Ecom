<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation {{ $order->order_number }} - VXPS Australia</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
            line-height: 1.6;
        }
        .container {
            max-width: 620px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .header {
            background: #0f172a;
            padding: 32px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            font-size: 26px;
            font-weight: 900;
            margin: 0;
            letter-spacing: 0.05em;
        }
        .header h1 span {
            color: #22c55e;
        }
        .header p {
            color: #94a3b8;
            font-size: 13px;
            margin: 6px 0 0 0;
        }
        .content {
            padding: 32px;
        }
        .badge {
            display: inline-block;
            background: #ecfdf5;
            color: #15803d;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 18px;
            border: 1px solid #bbf7d0;
        }
        .order-title {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .order-meta {
            background: #f8fafc;
            border-radius: 12px;
            padding: 16px 20px;
            border: 1px solid #e2e8f0;
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .meta-col {
            font-size: 13px;
        }
        .meta-col strong {
            display: block;
            color: #0f172a;
            font-size: 14px;
        }
        .meta-label {
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.05em;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0 16px 0;
            font-size: 13px;
        }
        .items-table th {
            text-align: left;
            padding: 10px 12px;
            background: #f1f5f9;
            color: #475569;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }
        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }
        .items-table td.qty {
            text-align: center;
            font-weight: 700;
        }
        .items-table td.price {
            text-align: right;
            font-weight: 700;
            color: #0f172a;
            font-family: monospace;
        }
        .totals-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            margin-top: 8px;
        }
        .totals-table td {
            padding: 6px 12px;
        }
        .totals-table .label {
            text-align: right;
            color: #64748b;
            font-weight: 600;
        }
        .totals-table .amount {
            text-align: right;
            width: 120px;
            font-weight: 700;
            color: #0f172a;
            font-family: monospace;
        }
        .totals-table .grand-total td {
            padding-top: 12px;
            border-top: 2px solid #e2e8f0;
            font-size: 16px;
            font-weight: 800;
            color: #15803d;
        }
        .shipping-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 18px 20px;
            border: 1px solid #e2e8f0;
            margin-top: 24px;
            font-size: 13px;
        }
        .shipping-box h3 {
            margin: 0 0 10px 0;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #475569;
        }
        .footer {
            background: #f8fafc;
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #94a3b8;
        }
        .footer a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VXPS<span>.</span> Australia</h1>
            <p>Smart Tech &bull; Portable Power &bull; Australian Reliability</p>
        </div>
        <div class="content">
            <span class="badge">Payment Confirmed &bull; Preparing for Dispatch</span>
            <div class="order-title">Thank you for your order, {{ $order->customer_name }}!</div>
            <p style="font-size: 14px; color: #475569; margin: 0 0 16px 0;">We have received your payment and are packing your items for dispatch from our Adelaide fulfillment facility.</p>

            <div class="order-meta">
                <div class="meta-col">
                    <span class="meta-label">Order Number</span>
                    <strong>{{ $order->order_number }}</strong>
                </div>
                <div class="meta-col">
                    <span class="meta-label">Order Date</span>
                    <strong>{{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : date('d M Y, h:i A') }}</strong>
                </div>
                <div class="meta-col">
                    <span class="meta-label">Payment Method</span>
                    <strong>{{ strtoupper($order->payment_method ?: 'Card') }}</strong>
                </div>
            </div>

            <!-- Items Table -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $itemsSubtotal = 0; @endphp
                    @foreach($order->items ?? [] as $item)
                        @php
                            $lineTotal = ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                            $itemsSubtotal += $lineTotal;
                        @endphp
                        <tr>
                            <td>
                                <strong>{{ $item['name'] ?? 'Product' }}</strong>
                                @if(!empty($item['category']))
                                    <div style="font-size: 11px; color: #94a3b8;">{{ $item['category'] }}</div>
                                @endif
                            </td>
                            <td class="qty">{{ $item['quantity'] ?? 1 }}</td>
                            <td class="price">${{ number_format($lineTotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Totals Table -->
            <table class="totals-table">
                <tr>
                    <td class="label">Items Subtotal:</td>
                    <td class="amount">${{ number_format($itemsSubtotal, 2) }}</td>
                </tr>
                <tr>
                    <td class="label">Shipping (Standard Tracked):</td>
                    <td class="amount">{{ $order->shipping_cost == 0 ? 'FREE' : '$' . number_format($order->shipping_cost, 2) }}</td>
                </tr>
                <tr class="grand-total">
                    <td class="label">Grand Total (AUD):</td>
                    <td class="amount">${{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </table>

            <!-- Shipping Address -->
            <div class="shipping-box">
                <h3>Delivery Address</h3>
                <p style="margin: 0; color: #0f172a; font-weight: 600;">{{ $order->customer_name }}</p>
                <p style="margin: 2px 0; color: #334155;">{{ $order->shipping_address }}</p>
                <p style="margin: 2px 0; color: #334155;">{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postcode }}</p>
                <p style="margin: 2px 0; color: #334155;">{{ $order->shipping_country ?: 'Australia' }}</p>
                @if($order->customer_phone && $order->customer_phone !== 'N/A')
                    <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12px;">Contact: {{ $order->customer_phone }}</p>
                @endif
                @if($order->notes)
                    <div style="margin-top: 10px; padding: 8px 12px; background: #ffffff; border-radius: 6px; border: 1px dashed #cbd5e1; font-size: 12px; color: #475569;">
                        <strong>Delivery Notes:</strong> {{ $order->notes }}
                    </div>
                @endif
            </div>

            <p style="font-size: 12px; color: #64748b; margin-top: 24px; text-align: center;">
                You will receive another email with your Australia Post tracking number as soon as your parcel is scanned for dispatch.
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} VX Power Semiconductor. AS/NZS Certified.</p>
            <p>Need support? Reply directly to this email or visit <a href="{{ config('app.url', 'https://vxps.com.au') }}/contact">vxps.com.au/contact</a></p>
        </div>
    </div>
</body>
</html>

