<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('guest.destination.index', compact('destinations'));
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
            
        return view('guest.destination.show', compact('destination', 'related_destinations'));
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
