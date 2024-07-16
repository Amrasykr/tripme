<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Reservation::with(['user', 'destination']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                })
                    ->orWhereHas('destination', function ($dq) use ($search) {
                        $dq->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        $visitors = $query->orderBy('status', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.dashboard.visitor.index', compact('visitors'));
    }




    public function confirm(string $id, Request $request)
    {
        $visitor = Reservation::find($id);

        $visitor->status = 'confirmed';
        $visitor->save();

        if ($visitor) {
            notify()->success(message: 'Successfully Confirming Visitor');
            return redirect()->route('admin.dashboard.visitor');
        } else {
            notify()->error(message: 'Failed to Confirm Visitor');
            return redirect()->back()->withInput();
        }
    }

    public function reject(string $id, Request $request)
    {
        $visitor = Reservation::find($id);

        $visitor->status = 'rejected';
        $visitor->save();

        if ($visitor) {
            notify()->success(message: 'Successfully Rejecting Visitor');
            return redirect()->route('admin.dashboard.visitor');
        } else {
            notify()->error(message: 'Failed to Reject Visitor');
            return redirect()->back()->withInput();
        }
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
