<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search keyword from input
        $search = $request->input('search');

        // Query travels based on search keyword
        $travelsQuery = Travel::query();

        if ($search) {
            $travelsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%');
            });
        }

        // Fetch travels based on query
        $travels = $travelsQuery->paginate(5);
        return view('admin.dashboard.travel.index', compact('travels'));
    }

    public function create()
    {
        return view('admin.dashboard.travel.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_per_km' => 'required',
        ]);

        $travel = new Travel([
            'name' => $validated_data['name'],
            'description' => $validated_data['description'],
            'price' => $validated_data['price'],
            'price_per_km' => $validated_data['price_per_km'],
        ]);

        $travel->save();

        if ($travel) {
            notify()->success(message: 'Successfully Creating Travel');
            return redirect()->route('admin.dashboard.travel');
        } else {
            notify()->error(message: 'Failed to Create Travel');
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

    public function edit(string $id)
    {
        $travel = Travel::find($id);

        if (!$travel) {
            notify()->error(message: 'Travel not found');
            return redirect()->route('admin.dashboard.travel');
        }

        return view('admin.dashboard.travel.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_per_km' => 'required',
        ]);

        $travel = Travel::find($id);

        if (!$travel) {
            notify()->error(message: 'Travel not found');
            return redirect()->route('admin.dashboard.travel');
        }

        $travel->name = $validated_data['name'];
        $travel->description = $validated_data['description'];
        $travel->price = $validated_data['price'];
        $travel->price_per_km = $validated_data['price_per_km'];

        $travel->save();

        if ($travel) {
            notify()->success(message: 'Successfully Updating Travel');
            return redirect()->route('admin.dashboard.travel');
        } else {
            notify()->error(message: 'Failed to Update Travel');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $travel = Travel::find($id);

        if (!$travel) {
            notify()->error(message: 'Travel not found');
            return redirect()->route('admin.dashboard.travel');
        }

        $travel->delete();

        if ($travel) {
            notify()->success(message: 'Successfully Deleting Travel');
            return redirect()->route('admin.dashboard.travel');
        } else {
            notify()->error(message: 'Failed to Delete Travel');
            return redirect()->back()->withInput();
        }
    }
}
