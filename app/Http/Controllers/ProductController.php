<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of Zellige products.
     */
    public function zelligeIndex(Request $request)
    {
        $zelligeCategory = Category::where('slug', 'zellige')->firstOrFail();

        // Base query for Zellige products
        $productsQuery = $zelligeCategory->products()->with('images');

        // Apply filters from the request
        if ($request->filled('colors')) {
            $productsQuery->whereIn('color', $request->input('colors'));
        }

        if ($request->filled('sizes')) {
            $productsQuery->whereIn('size', $request->input('sizes'));
        }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $productsQuery->whereBetween('price', [(float)$request->input('min_price'), (float)$request->input('max_price')]);
        }

        // Paginate the results, and append the query string to pagination links
        $products = $productsQuery->paginate(9)->withQueryString();

        // Get all available filter options from the Zellige category to display in the sidebar
        $allZelligeProducts = $zelligeCategory->products();
        $availableColors = $allZelligeProducts->pluck('color')->unique()->filter()->values();
        $availableSizes = $allZelligeProducts->pluck('size')->unique()->filter()->values();

        return view('products.zellige', [
            'products' => $products,
            'availableColors' => $availableColors,
            'availableSizes' => $availableSizes,
            'oldInput' => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('images'); // Eager load images
        return view('products.show', compact('product'));
    }


}
