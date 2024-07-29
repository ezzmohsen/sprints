<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|boolean',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // Display the specified product
    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // Update the specified product in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|boolean',
        ]);

        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    // Remove the specified product from storage
    public function destroy($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function edit($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage

}