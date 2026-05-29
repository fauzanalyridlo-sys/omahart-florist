<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // MENAMPILKAN LIST KATEGORI
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.categories.create');
    }

    // SIMPAN KATEGORI BARU
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('image')) {
            $fileName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/kategori'), $fileName);
        }

        Category::create([
            'name'  => $request->name,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $fileName = $category->image;

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($fileName && file_exists(public_path('images/kategori/' . $fileName))) {
                unlink(public_path('images/kategori/' . $fileName));
            }

            // Upload gambar baru
            $fileName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/kategori'), $fileName);
        }

        $category->update([
            'name'  => $request->name,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil diupdate');
    }

    // HAPUS KATEGORI
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && file_exists(public_path('images/kategori/' . $category->image))) {
            unlink(public_path('images/kategori/' . $category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil dihapus');
    }
}
