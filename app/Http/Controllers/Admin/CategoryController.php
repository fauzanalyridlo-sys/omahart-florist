<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            // Folder tujuan: public/images/kategori
            $destination = public_path('images/kategori');

            // Buat folder jika belum ada
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            // Upload file
            $request->image->move($destination, $imageName);

            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $category->name = $request->name;

        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($category->image && file_exists(public_path('images/kategori/' . $category->image))) {
                unlink(public_path('images/kategori/' . $category->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $destination = public_path('images/kategori');

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $request->image->move($destination, $imageName);

            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Hapus gambar
        if ($category->image && file_exists(public_path('images/kategori/' . $category->image))) {
            unlink(public_path('images/kategori/' . $category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
