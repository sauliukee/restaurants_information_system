<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
    public function index($restaurant_id)
    {
        $reservations = Reservation::where('user_id', Auth::id())->where('restaurant_id', $restaurant_id)->get();
        return view('user.reservation.index', compact('reservations', 'restaurant_id'));
    }

    public function create($restaurant_id)
    {
        $tables = Table::where('restaurant_id', $restaurant_id)->get();
        return view('user.reservation.create', compact('tables', 'restaurant_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel_number' => 'required|string|max:15',
            'res_date' => 'required|date',
            'guest_number' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $reservation = new Reservation($request->all());
        $reservation->user_id = Auth::id();
        $reservation->save();

        return redirect()->route('user.reservations.index', ['restaurant' => $request->restaurant_id])->with('success', 'Reservation created successfully.');
    }

    public function edit($restaurant_id, $id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->where('restaurant_id', $restaurant_id)->findOrFail($id);
        $tables = Table::where('restaurant_id', $restaurant_id)->get();
        return view('user.reservation.edit', compact('reservation', 'tables', 'restaurant_id'));
    }

    public function update(Request $request, $restaurant_id, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel_number' => 'required|string|max:15',
            'res_date' => 'required|date',
            'guest_number' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id'
        ]);

        $reservation = Reservation::where('user_id', Auth::id())->where('restaurant_id', $restaurant_id)->findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('user.reservations.index', ['restaurant' => $restaurant_id])->with('success', 'Reservation updated successfully.');
    }

    public function destroy($restaurant_id, $id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->where('restaurant_id', $restaurant_id)->findOrFail($id);
        $reservation->delete();
        return redirect()->route('user.reservations.index', ['restaurant' => $restaurant_id])->with('success', 'Reservation deleted successfully.');
    }
}
