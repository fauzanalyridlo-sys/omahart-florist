<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah data
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();  // Atau where role = admin jika ada role

        // Kirim ke view
        return view('admin.dashboard', [
            'totalCategories' => $totalCategories,
            'totalProducts'   => $totalProducts,
            'totalUsers'      => $totalUsers,
        ]);
    }
}
