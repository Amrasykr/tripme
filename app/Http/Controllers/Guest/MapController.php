<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class MapController extends Controller
{
    /**
     * Display the interactive map with all destinations.
     */
    public function index()
    {
        // Fetch all destinations that have valid coordinates
        $destinations = Destination::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get()
            ->map(function ($destination) {
                return [
                    'id' => $destination->id,
                    'name' => $destination->name,
                    'description' => $destination->description,
                    'category' => $destination->category,
                    'address' => $destination->address,
                    'price' => $destination->price,
                    'latitude' => $destination->latitude,
                    'longitude' => $destination->longitude,
                    'main_image' => asset('assets/tumbnail_image/' . $destination->main_image),
                    'url' => url('/destination/' . $destination->id),
                ];
            });

        return view('guest.map.index', compact('destinations'));
    }
}
