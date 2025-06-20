<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //**INDEX */
    public function index()
    {
        return view('backend.product.index');
    }

    //** ALL PRODUCT */
    public function productRecords()
    {
        $products = product::get();
        return view('backend.product.allProduct', compact('products'));
    }

    //**STORE  */
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


    // **DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Optional: delete product images from public folder
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
