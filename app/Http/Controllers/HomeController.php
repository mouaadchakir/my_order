<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display the homepage with categories and their products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch categories that have products, along with a few products for each category.
        $categories = Category::whereHas('products')
            ->withCount('products')
            ->with(['products' => function ($query) {
                // Eager load the product's primary image if available
                $query->with('images')->limit(4);
            }])
            ->get();

        return view('home', compact('categories'));
    }
}
