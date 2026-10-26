<?php

namespace App\Http\Controllers;

use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Controller
{
    // 1. Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = ProductModel::latest()->get();

        return view('product.index', compact('products'));
    }

    // 2. Hiển thị form thêm sản phẩm
    public function create()
    {
        return view('product.create');
    }

    // 3. Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'name', 'price', 'quantity', 'description'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        ProductModel::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Thêm sản phẩm thành công!');
    }

    // 4. Xem chi tiết sản phẩm
    public function show($id)
    {
        $product = ProductModel::findOrFail($id);

        return view('product.show', compact('product'));
    }

    // 5. Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    // 6. Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'name', 'price', 'quantity', 'description'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 7. Xóa sản phẩm
    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Xóa sản phẩm thành công!');
    }
}