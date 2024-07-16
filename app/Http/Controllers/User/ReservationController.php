<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservation = Reservation::where('user_id', auth()->id())->get();
        $pending_reservation = Reservation::where('user_id', auth()->id())->where('status', 'pending')->count();
        $confirmed_reservation = Reservation::where('user_id', auth()->id())->where('status', 'confirmed')->count();
        $finished_reservation = Reservation::where('user_id', auth()->id())->where('status', 'finished')->count();
        return view('user.dashboard.reservation.index', compact('reservation', 'pending_reservation', 'confirmed_reservation', 'finished_reservation'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function confirm(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'finished';
        $reservation->save();

        return redirect()->back();
    }

    public function cancel(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'canceled';
        $reservation->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
