<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MadeToMeasureRequest;

class MadeToMeasureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('made-to-measure', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // If 'other' is selected, we'll validate the custom product_name
        // and treat product_id as null.
        if ($request->input('product_id') === 'other') {
            $request->merge(['product_id' => null]);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'product_id' => 'nullable|exists:products,id',
            'product_name' => 'required_without:product_id|nullable|string|max:255',
            'width' => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $createData = $validatedData;

        // If a product was selected from the list, get its name.
        if (!empty($validatedData['product_id'])) {
            $product = Product::find($validatedData['product_id']);
            $createData['product_name'] = $product->name;
        }

        MadeToMeasureRequest::create($createData);

        return redirect()->route('made-to-measure.create')
                         ->with('success', 'Your request has been submitted successfully! We will get back to you soon.');
    }
}
