<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Destination;
use App\Models\Travel;
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
    public function store(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'date' => 'required',
            'person' => 'required|integer',
            'duration' => 'required|integer',
            'pickup_location' => 'sometimes',
            'distance_in_km' => 'sometimes',
            'travel_id' => 'sometimes',
        ]);
    
        $destination = Destination::findOrFail($id);
    
        $reservations_on_date = Reservation::where('destination_id', $id)
            ->whereDate('date', $validated_data['date'])
            ->sum('person');

        $remaining_capacity = $destination->capacity_perday - $reservations_on_date;

        if ($validated_data['person'] > $remaining_capacity) {
            notify()->error('Reservation capacity for the selected date is full.');
            return redirect()->back()->withInput();
        }

        $travel = Travel::find($validated_data['travel_id'] ?? null);
    
        $total_price = $destination->price * $validated_data['person'];
        if ($travel) {
            $total_price += $travel->price + ($travel->price_per_km * ($validated_data['distance_in_km'] ?? 0));
        }
    
        $reservation = new Reservation([
            'user_id' => auth()->id(),
            'date' => $validated_data['date'],
            'duration' => $validated_data['duration'],
            'person' => $validated_data['person'],
            'pickup_location' => $validated_data['pickup_location'] ?? null,
            'distance_in_km' => $validated_data['distance_in_km'] ?? null,
            'travel_id' => $validated_data['travel_id'] ?? null,
            'destination_id' => $id,
            'total_price' => $total_price,
            'status' => 'unpaid',
        ]);
    
        $reservation->save();
    
        if ($reservation) {
            notify()->success('Successfully Creating Reservation');
            return redirect()->route('user.dashboard.reservation');
        } else {
            notify()->error('Failed to Create Reservation');
            return redirect()->back()->withInput();
        }
    }
    
    

    public function confirm(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'finished';
        $reservation->save();

        if ($reservation) {
            notify()->success(message: 'Successfully Confirming Reservation');
            return redirect()->route('user.dashboard.reservation');
        } else {
            notify()->error(message: 'Failed to Confirm Reservation');
            return redirect()->back()->withInput();
        }
    }

    public function cancel(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'canceled';
        $reservation->save();

        if ($reservation) {
            notify()->success(message: 'Successfully Canceling Reservation');
            return redirect()->route('user.dashboard.reservation');
        } else {
            notify()->error(message: 'Failed to Cancel Reservation');
            return redirect()->back()->withInput();
        }
    }

    public function review(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'rating' => 'required',
            'content' => 'required',
        ]);

        $review = new Review([
            'user_id' => auth()->id(),
            'reservation_id' => $id,
            'rating' => $validated_data['rating'],
            'content' => $validated_data['content'],
        ]);

        $review->save();

        if ($review) {
            notify()->success(message: 'Successfully Reviewing Reservation');
            return redirect()->route('user.dashboard.reservation');
        } else {
            notify()->error(message: 'Failed to Review Reservation');
            return redirect()->back()->withInput();
        }
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
