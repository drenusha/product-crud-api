<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
// Show all products
public function index()
{
$products = Products::all();
return response()->json($products);
}

// Show a single product by ID
public function show($id)
{
$product = Products::find($id);
if (!$product) {
return response()->json(['message' => 'Product not found'], 404);
}

return response()->json($product);
}

// Store a new product
public function store(Request $request)
{
$validatedData = $request->validate([
'product_name' => 'required',
'product_price' => 'required|numeric',
]);

$product = Products::create($validatedData);

return response()->json($product, 201);
}

// Update a product by ID
public function update(Request $request, $id)
{
$product = Products::find($id);
if (!$product) {
return response()->json(['message' => 'Product not found'], 404);
}

$product->update($request->all());

return response()->json($product);
}

// Delete a product by ID
public function destroy($id)
{
$product = Products::find($id);
if (!$product) {
return response()->json(['message' => 'Product not found'], 404);
}

$product->delete();

return response()->json(['message' => 'Product deleted']);
}
}