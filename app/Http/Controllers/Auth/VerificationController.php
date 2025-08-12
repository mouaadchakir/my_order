<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        if (!$request->session()->has('user_id_for_verification')) {
            return redirect()->route('login');
        }

        return view('auth.verify-code');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric|digits:6',
        ]);

        $userId = $request->session()->get('user_id_for_verification');

        if (!$userId) {
            return redirect()->route('login')->withErrors(['verification_code' => 'Session expired. Please try to register again.']);
        }

        $user = User::find($userId);

        if (!$user || $user->verification_code !== $request->verification_code) {
            return back()->withErrors(['verification_code' => 'The verification code is invalid.']);
        }

        $user->email_verified_at = now();
        $user->verification_code = null; // Clear the code
        $user->save();

        $request->session()->forget('user_id_for_verification');

        Auth::login($user);

        return redirect()->intended('/');
    }
}
