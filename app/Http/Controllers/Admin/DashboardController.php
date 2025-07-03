<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MadeToMeasureRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $newRequestsCount = MadeToMeasureRequest::where('status', 'New')->count();
        $productsCount = Product::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('newRequestsCount', 'productsCount', 'usersCount'));
    }
}