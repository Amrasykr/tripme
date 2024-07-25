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
        $reservation = Reservation::where('user_id', auth()->id())->paginate(3);
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

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $total_price,
            ],
            'customer_details' => [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
            ],
            'reservation_detail' => [
                'destination' => $destination->name,
                'destination_price_perperson' => $destination->price,
                'person' => $validated_data['person'],
                'total_ticket_price' => $destination->price * $validated_data['person'],
            ],
        ];

        if ($travel) {
            $params['travel_id'] = [
                'travel' => $travel->name,
                'price' => $travel->price,
                'price_perkm' => $travel->price_per_km,
                'distance' => $validated_data['distance_in_km'],
                'travel_price_perkm' => $travel->price_per_km * ($validated_data['distance_in_km'] ?? 0),
                'total_travel_price' => $travel->price + ($travel->price_per_km * ($validated_data['distance_in_km'] ?? 0)),
            ];
        }

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $reservation->snap_token = $snapToken;
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


    public function paymentSuccess($snap_token)
    {
        $reservation = Reservation::where('snap_token', $snap_token)->firstOrFail();
        $reservation->status = 'paid and pending';
        $reservation->save();

        notify()->success('Successfully Payment Reservation');
        return redirect()->route('user.dashboard.reservation');
    }

    public function paymentFailed($snap_token)
    {
        $reservation = Reservation::where('snap_token', $snap_token)->firstOrFail();
        $reservation->status = 'unpaid';
        $reservation->save();

        notify()->error('Failed to Payment Reservation');
        return redirect()->route('user.dashboard.reservation');
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
