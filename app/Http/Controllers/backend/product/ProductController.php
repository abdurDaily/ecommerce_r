<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // INDEX PAGE
    public function index()
    {
        return view('backend.product.index');
    }

    // SHOW ALL PRODUCTS
    public function productRecords()
    {
        $products = Product::get();
        return view('backend.product.allProduct', compact('products'));
    }

    // STORE NEW PRODUCT
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock_status' => 'required|boolean',
            'details' => 'required|string',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required_with:faqs.*.answer|string',
            'faqs.*.answer' => 'required_with:faqs.*.question|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);
                $imageNames[] = $filename;
            }
        }

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock_status' => $request->stock_status,
            'details' => $request->details,
            'faqs' => $request->faqs,
            'images' => $imageNames,
        ]);

        return response()->json(['message' => 'Product created successfully']);
    }

    // SHOW EDIT PAGE
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.editProduct', compact('product'));
    }

    // UPDATE EXISTING PRODUCT
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // আগে থেকে ইমেজ আছে কি না চেক করবো
        $hasExistingImages = $request->has('existing_images') && count($request->existing_images) > 0;

        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'stock_status' => 'required|boolean',
            'details' => 'required|string',
            'faqs' => 'required|array',
            'faqs.*.question' => 'required|string',
            'faqs.*.answer' => 'required|string',
            'existing_images' => 'nullable|array',
        ];

        // নতুন ইমেজ অবশ্যই দরকার, যদি আগে থেকে কোন existing image না থাকে
        if (!$hasExistingImages) {
            $rules['images'] = 'required|array';
            $rules['images.*'] = 'image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } else {
            // যদি আগে থেকে ছবি থাকে, new images optional, কিন্তু দিলে চেক করবে valid কি না
            $rules['images'] = 'nullable|array';
            $rules['images.*'] = 'image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        $request->validate($rules);

        // Handle existing images from the form (hidden inputs)
        $existingImages = $request->existing_images ?? [];

        // Handle new uploaded images
        $imageNames = $existingImages; // start with existing
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);
                $imageNames[] = $filename;
            }
        }

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock_status' => $request->stock_status,
            'details' => $request->details,
            'faqs' => $request->faqs,
            'images' => $imageNames,
        ]);

        return response()->json(['message' => 'Product updated successfully']);
    }




    // DELETE PRODUCT
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image files
        if (is_array($product->images)) {
            foreach ($product->images as $image) {
                $path = public_path('uploads/products/' . $image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
