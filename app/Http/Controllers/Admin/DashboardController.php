<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Reservation::query();

        if ($search) {
            $query->whereHas('destination', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
    
        $total_destinations = Destination::count();
        $total_users = User::where('role', 'user')->count();
        $total_visitors = Reservation::count();
    
        $total_visitors_by_reservations = $query
            ->select('destination_id', DB::raw('count(*) as total_visitors'))
            ->groupBy('destination_id')
            ->get()
            ->map(function ($item) {
                $destination = Destination::find($item->destination_id);
                if ($destination) {
                    $item->destination_name = $destination->name;
                } else {
                    $item->destination_name = 'Unknown Destination';
                }
                return $item;
            });

        return view('admin.dashboard.index', compact('total_destinations', 'total_users', 'total_visitors', 'total_visitors_by_reservations', 'search'));
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
