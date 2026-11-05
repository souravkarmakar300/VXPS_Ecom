<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of orders with filters and customer search.
     */
    public function index(Request $request): View
    {
        $status = $request->input('status', 'all');
        $paymentStatus = $request->input('payment_status', 'all');
        $query = trim($request->input('q', ''));

        $ordersQuery = Order::query()->latest();

        if ($status !== 'all' && !empty($status)) {
            $ordersQuery->where('status', $status);
        }

        if ($paymentStatus !== 'all' && !empty($paymentStatus)) {
            $ordersQuery->where('payment_status', $paymentStatus);
        }

        if (!empty($query)) {
            $ordersQuery->where(function ($q) use ($query) {
                $q->where('order_number', 'like', "%{$query}%")
                    ->orWhere('customer_name', 'like', "%{$query}%")
                    ->orWhere('customer_email', 'like', "%{$query}%")
                    ->orWhere('customer_phone', 'like', "%{$query}%")
                    ->orWhere('shipping_city', 'like', "%{$query}%")
                    ->orWhere('shipping_address', 'like', "%{$query}%")
                    ->orWhere('payment_reference', 'like', "%{$query}%");
            });
        }

        $orders = $ordersQuery->paginate(15)->withQueryString();

        $counts = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'confirmed' => Order::where('status', 'confirmed')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'dispatched' => Order::where('status', 'dispatched')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'total_revenue' => (float) Order::where('payment_status', 'paid')->sum('total_amount'),
        ];

        return view('admin.orders.index', compact('orders', 'status', 'paymentStatus', 'query', 'counts'));
    }

    /**
     * Display single order details with full customer, items, and shipping info.
     */
    public function show(Order $order): View
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status or payment status.
     */
    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,confirmed,processing,dispatched,delivered,completed,cancelled',
            'payment_status' => 'nullable|string|in:paid,pending,failed,refunded',
            'notes' => 'nullable|string|max:1000',
        ]);

        $order->status = $validated['status'];

        if (!empty($validated['payment_status'])) {
            $order->payment_status = $validated['payment_status'];
        }

        if ($request->has('notes')) {
            $order->notes = $validated['notes'];
        }

        $order->save();

        return back()->with('success', "Order #{$order->order_number} has been updated successfully.");
    }

    /**
     * Delete an order.
     */
    public function destroy(Order $order): RedirectResponse
    {
        $orderNumber = $order->order_number;
        $order->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', "Order #{$orderNumber} was deleted successfully.");
    }
}

