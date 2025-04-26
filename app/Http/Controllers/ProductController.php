<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Exception;

class ProductController extends Controller
{
   /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function create(): JsonResponse
    {
        return response()->json([
            'name' => 'mobile',
            'description' =>'sumsang',
            'price' => 1000,
            'stock' => 10,
        ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
$product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }
        return response()->json($product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 202);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
         Product::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
