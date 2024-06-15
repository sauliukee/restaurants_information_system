<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Restaurant::where('name', 'specials')->first();

        return view('welcome', compact('specials'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
