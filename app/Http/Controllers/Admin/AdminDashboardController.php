<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index(Request $request): View
    {
        $currentAdmin = Auth::guard('admin')->user();
        $totalAdmins = Admin::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalContacts = Contact::count();
        $recentOrders = Order::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $recentAdmins = Admin::latest()->take(5)->get();

        $stats = [
            'total_admins' => $totalAdmins,
            'total_products' => $totalProducts,
            'total_orders' => $totalOrders,
            'total_contacts' => $totalContacts,
            'database_status' => 'Connected (MySQL)',
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'environment' => app()->environment(),
        ];

        return view('admin.dashboard', compact('currentAdmin', 'stats', 'recentAdmins', 'recentOrders', 'recentContacts'));
    }
}
