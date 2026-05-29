<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'description' => 'nullable',
            'start_price' => 'required', // <-- tidak numeric!
            'image'       => 'nullable|image|max:2048'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->start_price = $request->start_price;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('produk'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'description' => 'nullable',
            'start_price' => 'required', // <-- tidak numeric!
            'image'       => 'nullable|image|max:2048'
        ]);

        $product->category_id = $request->category_id;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->start_price = $request->start_price;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('produk'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('produk/'.$product->image))) {
            unlink(public_path('produk/'.$product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
