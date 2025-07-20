<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // GET /api/produk
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // POST /api/produk
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|max:255',
    'description' => 'nullable',
    'price' => 'required|numeric|min:0',
    'whatsapp' => 'nullable|string|max:20',
    'alamat' => 'nullable|string|max:255',
]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // GET /api/produk/{id}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
        return view('produk.show', compact('produk'));
    }
   
    // PUT/PATCH /api/produk/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|max:255',
            'description' => 'nullable',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    // DELETE /api/produk/{id}
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produk dihapus'], 200);
    }
}
