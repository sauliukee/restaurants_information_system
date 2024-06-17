<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        Log::info("Fetching reservations for user: ", ['user' => $user]);

        $reservations = Reservation::where('user_id', $user->id)
            ->orWhere('email', $user->email)
            ->get();

        Log::info("Reservations fetched: ", $reservations->toArray());

        return view('user.reservation.index', compact('reservations'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $tables = Table::all();
        return view('user.reservation.create', compact('tables', 'restaurants'));
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

        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->where('res_date', $request->res_date)
            ->exists();

        if ($existingReservation) {
            return redirect()->back()->withErrors(['table_id' => 'This table is already reserved for the selected date and time.'])->withInput();
        }

        $reservation = new Reservation($request->all());
        $reservation->user_id = Auth::id(); // If the user is authenticated, assign user_id
        $reservation->save();

        return redirect()->route('user.reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())
            ->orWhere('email', Auth::user()->email)
            ->findOrFail($id);

        $restaurants = Restaurant::all();
        $tables = Table::where('restaurant_id', $reservation->restaurant_id)->get();

        return view('user.reservation.edit', compact('reservation', 'tables', 'restaurants'));
    }

    public function update(Request $request, $id)
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

        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->where('res_date', $request->res_date)
            ->where('id', '!=', $id)
            ->exists();

        if ($existingReservation) {
            return redirect()->back()->withErrors(['table_id' => 'This table is already reserved for the selected date and time.'])->withInput();
        }

        $reservation = Reservation::where('user_id', Auth::id())
            ->orWhere('email', Auth::user()->email)
            ->findOrFail($id);

        $reservation->update($request->all());

        return redirect()->route('user.reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())
            ->orWhere('email', Auth::user()->email)
            ->findOrFail($id);

        $reservation->delete();

        return redirect()->route('user.reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}
