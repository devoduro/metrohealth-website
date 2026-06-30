<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image_file' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '-' . Str::slug($validated['name']) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        // Remove temporary field
        unset($validated['image_file']);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image_file' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'existing_image' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '-' . Str::slug($validated['name']) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
            
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
        } else {
            // Keep existing image if no new upload
            $validated['image'] = $request->input('existing_image');
        }

        // Remove temporary fields
        unset($validated['image_file']);
        unset($validated['existing_image']);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
