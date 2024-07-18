<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Reservation;
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
    
        $top = Destination::select('destination.id', 'destination.name', 'destination.category', 'destination.main_image', 'destination.description', 'destination.created_at', 'destination.address', 'destination.address_url', DB::raw('COUNT(reservation.destination_id) as total_visitors'))
            ->join('reservation', 'destination.id', '=', 'reservation.destination_id')
            ->groupBy('destination.id', 'destination.name', 'destination.category', 'destination.main_image', 'destination.description', 'destination.created_at', 'destination.address', 'destination.address_url')
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
        //
        $destination = Destination::find($id);
        $related_destinations = Destination::where('category', $destination->category)
            ->where('id', '!=', $destination->id)
            ->get();

        $total_visitors = DB::table('reservation')
            ->where('destination_id', $destination->id)
            ->count();
            
        return view('guest.destination.show', compact('destination', 'related_destinations', 'total_visitors'));
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
