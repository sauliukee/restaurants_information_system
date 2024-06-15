<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantStoreRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
public function index()
{
$restaurants = Restaurant::all();
return view('restaurants.index', compact('restaurants'));
}

public function create()
{
return view('admin.restaurants.create');
}

public function store(RestaurantStoreRequest $request)
{
$imagePath = $request->file('image')->store('restaurants', 'public');

Restaurant::create([
'name' => $request->name,
'description' => $request->description,
'image' => $imagePath,
]);

return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant created successfully.');
}

public function show($id)
{
$restaurant = Restaurant::findOrFail($id);
return view('restaurants.show', compact('restaurant'));
}

public function edit(Restaurant $restaurant)
{
return view('admin.restaurants.edit', compact('restaurant'));
}

public function update(Request $request, Restaurant $restaurant)
{
$request->validate([
'name' => 'required',
'description' => 'required'
]);

$imagePath = $restaurant->image;
if($request->hasFile('image')){
Storage::delete($restaurant->image);
$imagePath = $request->file('image')->store('restaurants', 'public');
}

$restaurant->update([
'name' => $request->name,
'description' => $request->description,
'image' => $imagePath,
]);

return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant updated successfully.');
}

public function destroy(Restaurant $restaurant)
{
$restaurant->menus()->detach();
Storage::delete($restaurant->image);
$restaurant->delete();

return redirect()->route('admin.restaurants.index')->with('danger', 'Restaurant deleted successfully.');
}
}
