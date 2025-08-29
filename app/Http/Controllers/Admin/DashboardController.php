<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\MadeToMeasureRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersCount = User::count();
        $productsCount = Product::count();
        $newRequestsCount = MadeToMeasureRequest::where('status', 'New')->count();

        return view('admin.dashboard', compact('usersCount', 'productsCount', 'newRequestsCount'));
    }
}