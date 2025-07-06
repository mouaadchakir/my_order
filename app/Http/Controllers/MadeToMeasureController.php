<?php

namespace App\Http\Controllers;

use App\Models\MadeToMeasureRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class MadeToMeasureController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('made-to-measure', compact('products'));
    }

    public function store(Request $request)
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
            'color' => 'nullable|string|max:255',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'notes' => 'nullable|string',
            'measurement_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Max 2MB
        ];

        if ($request->input('product_id') === 'other') {
            $rules['product_name'] = 'required|string|max:255';
        } else {
            $rules['product_id'] = 'required|exists:products,id';
        }

        $validatedData = $request->validate($rules);

        // Handle product name
        if ($request->input('product_id') === 'other') {
            $validatedData['product_name'] = $request->input('product_name');
        } else {
            $product = Product::find($validatedData['product_id']);
            $validatedData['product_name'] = $product->name;
        }

        // Handle file upload
        if ($request->hasFile('measurement_file')) {
            $filePath = $request->file('measurement_file')->store('measurements', 'public');
            $validatedData['file_path'] = $filePath;
        }

        MadeToMeasureRequest::create($validatedData);

        return redirect()->route('made-to-measure.create')->with('success', 'Your request has been submitted successfully! We will get back to you soon.');
    }
}
