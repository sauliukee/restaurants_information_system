<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
public function index()
{
$restaurants = Restaurant::all();
return view('restaurants.index', compact('restaurants'));
}

public function show(Restaurant $restaurant)
{
$restaurant->load('menus'); // Load the menus relationship if needed
return view('restaurants.show', compact('restaurant'));
}
}
