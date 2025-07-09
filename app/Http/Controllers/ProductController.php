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
    public function zelligeIndex()
    {
        // Find the Zellige category
        $zelligeCategory = Category::where('slug', 'zellige')->first();

        // If the category doesn't exist, return a 404 or an empty view
        if (!$zelligeCategory) {
            // Or handle this case as you see fit, maybe redirect or show a message
            return view('products.zellige', ['products' => collect()]);
        }

        // Get paginated products from that category
        $products = $zelligeCategory->products()->with('images')->paginate(9);

        return view('products.zellige', compact('products'));
    }


}
