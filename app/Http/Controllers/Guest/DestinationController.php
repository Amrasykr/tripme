<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Reservation;
use App\Models\Travel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
    
        $top = Destination::select(
            'destination.id',
            'destination.name',
            'destination.category',
            'destination.main_image',
            'destination.description',
            'destination.created_at',
            'destination.address',
            'destination.address_url',
            DB::raw('SUM(reservation.person) as total_visitors')
        )
        ->join('reservation', 'destination.id', '=', 'reservation.destination_id')
        ->groupBy(
            'destination.id',
            'destination.name',
            'destination.category',
            'destination.main_image',
            'destination.description',
            'destination.created_at',
            'destination.address',
            'destination.address_url'
        )
        ->orderByDesc('total_visitors')
        ->first();


        $total_visitors = $top ? $top->total_visitors : 0;
    
        return view('guest.destination.index', compact('destinations', 'top', 'total_visitors'));
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
        $destination = Destination::find($id);

        $related_destinations = Destination::where('category', $destination->category)
            ->where('id', '!=', $destination->id)
            ->get();

        $total_visitors = DB::table('reservation')
            ->where('destination_id', $destination->id)
            ->sum('person');
    
        $today_reservations = DB::table('reservation')
            ->where('destination_id', $destination->id)
            ->whereDate('date', Carbon::today())
            ->sum('person');

        $available_capacity_today = $destination->capacity_perday - $today_reservations;
        $travels = Travel::all();
    
        return view('guest.destination.show', compact('destination', 'related_destinations', 'total_visitors', 'travels', 'available_capacity_today'));
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
