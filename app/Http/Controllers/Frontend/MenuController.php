<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($restaurantId = null)
    {
        if ($restaurantId) {
            $restaurant = Restaurant::findOrFail($restaurantId);
            $menus = $restaurant->menus; // Assuming a restaurant has many menus
        } else {
            $menus = Menu::all(); // Fallback if no restaurantId is provided
        }

        return view('menus.index', compact('menus', 'restaurant'));
    }

public function show($id)
{
$menu = Menu::findOrFail($id);
return view('menus.show', compact('menu'));
}
}
