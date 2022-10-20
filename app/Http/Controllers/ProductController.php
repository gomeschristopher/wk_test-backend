<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::get());
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->input());
        return response()->json([], 201);
    }

    public function update(ProductRequest $request, int $id)
    {
        Product::findOrFail($id)->update($request->input());
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        Product::findOrFail($id)->delete();
        return response()->json([], 204);
    }
}
