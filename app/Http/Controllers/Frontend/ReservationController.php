<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Table;
use App\Enums\TableStatus;
use Illuminate\Http\Request;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function stepOne(Request $request, $restaurantId)
    {
        $reservation = $request->session()->get('reservation');
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('reservations.step-one', compact('reservation', 'restaurant'));
    }

    public function storeStepOne(Request $request, $restaurantId)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween(), new TimeBetween()],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $reservation->restaurant_id = $restaurantId; // Add restaurant_id
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $reservation->restaurant_id = $restaurantId; // Add restaurant_id
            $request->session()->put('reservation', $reservation);
        }

        return to_route('reservations.step.two', ['restaurant' => $restaurantId]);
    }

    public function stepTwo(Request $request, $restaurantId)
    {
        $reservation = $request->session()->get('reservation');
        $restaurant = Restaurant::findOrFail($restaurantId); // Add this line
        $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function($value) use ($reservation) {
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('table_id');
        $tables = Table::where('status', TableStatus::Available)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $res_table_ids)->get();
        return view('reservations.step-two', compact('reservation', 'tables', 'restaurant')); // Add restaurant to compact
    }

    public function storeStepTwo(Request $request, $restaurantId)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankyou');
    }

    public function create()
    {
        $tables = Table::all();
        return view('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween(), new TimeBetween()],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
            'table_id' => ['required']
        ]);

        Reservation::create($validated);

        return to_route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }
}
