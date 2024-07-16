<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $year = $request->input('year', now()->year);
        $month = $request->input('month', now()->month);

        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        $reservations = Reservation::where('user_id', $user->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

            $pending_reservation = Reservation::where('user_id', auth()->id())->where('status', 'pending')->count();
            $confirmed_reservation = Reservation::where('user_id', auth()->id())->where('status', 'confirmed')->count();
            $finished_reservation = Reservation::where('user_id', auth()->id())->where('status', 'finished')->count();

        return view('user.dashboard.calendar.index', compact('year', 'month', 'reservations', 'pending_reservation', 'confirmed_reservation', 'finished_reservation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
