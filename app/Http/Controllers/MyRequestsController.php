<?php

namespace App\Http\Controllers;

use App\Models\MadeToMeasureRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyRequestsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get all requests matching the authenticated user's email
        $requests = MadeToMeasureRequest::where('email', $user->email)
                                        ->latest()
                                        ->paginate(10);

        return view('my-requests.index', compact('requests'));
    }
}
