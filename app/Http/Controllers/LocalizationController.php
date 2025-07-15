<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($locale)
    {
        if (in_array($locale, ['en', 'fr'])) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
