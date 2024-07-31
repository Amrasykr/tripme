<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $top_3_destinations = Destination::select('destination.id', 'destination.name', 'destination.category', 'destination.main_image', 'destination.description', 'destination.price')
        ->join('reservation', 'destination.id', '=', 'reservation.destination_id')
        ->groupBy('destination.id', 'destination.name', 'destination.category', 'destination.main_image', 'destination.description', 'destination.price')
        ->orderByRaw('COUNT(reservation.destination_id) DESC')
        ->limit(3)
        ->get();

        $reviews = Review::where('status', 'published')->get();
        
        return view('guest.welcome', ['top_3_destinations' => $top_3_destinations] , ['reviews' => $reviews]);
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
