<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    // ===============================
    // HALAMAN HOME
    // ===============================
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->take(12)->get();

        return view('home', compact('categories', 'products'));
    }

    // ===============================
    // HALAMAN DETAIL PRODUK
    // ===============================
    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('product-detail', compact('product'));
    }

    // ===============================
    // HALAMAN KATEGORI
    // ===============================
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('category', compact('category', 'products'));
    }

    // ===============================
    // HALAMAN TENTANG
    // ===============================
    public function about()
    {
        return view('tentang');
    }

    // ===============================
    // HALAMAN KONTAK
    // ===============================
    public function contact()
    {
        return view('contact');
    }

    // ===============================
    // HALAMAN PENCARIAN PRODUK
    // ===============================
    public function search(Request $request)
    {
        // Ambil query, default string kosong
        $query = $request->input('q', '');

        // Jika query kosong, kembalikan view dengan collection kosong
        if (empty($query)) {
            return view('search', [
                'products' => collect(),
                'query' => $query,
                'message' => 'Masukkan kata kunci pencarian.'
            ]);
        }

        // Cari produk berdasarkan nama atau deskripsi
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        // Kirim ke view
        return view('search', [
            'products' => $products,
            'query' => $query,
            'message' => $products->isEmpty() ? 'Produk tidak ditemukan.' : ''
        ]);
    }
}
