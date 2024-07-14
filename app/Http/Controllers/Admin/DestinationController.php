<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.dashboard.destination.index', compact('destinations'));
    }

    public function create()
    {

        return view('admin.dashboard.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'address_url' => 'required',
            'category' => 'required',
            'tumbnail' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'image_1' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'image_3' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image_4' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image' => 'required',
            'contact' => 'required',
        ]);

        $destination = new Destination([
            'name' => $validated_data['name'],
            'description' => $validated_data['description'],
            'address' => $validated_data['address'],
            'address_url' => $validated_data['address_url'],
            'category' => $validated_data['category'],
            'main_image' => $validated_data['tumbnail'],
            'image' => $validated_data['image'],
            'contact' => $validated_data['contact'],
        ]);

        // Handle tumbnail
        if ($request->hasFile('tumbnail') && $request->file('tumbnail')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('tumbnail')->getClientOriginalExtension();
            $request->file('tumbnail')->move('assets/destination_image', $newFileName);
            $destination->main_image = $newFileName;
        } else {
            $destination->main_image = 'default-thumbnail.png';
        }

        // Handle image_1
        if ($request->hasFile('image_1') && $request->file('image_1')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('image_1')->getClientOriginalExtension();
            $request->file('image_1')->move('assets/destination_image', $newFileName);
            $destination->image_1 = $newFileName;
        }

        // Handle image_2
        if ($request->hasFile('image_2') && $request->file('image_2')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('image_2')->getClientOriginalExtension();
            $request->file('image_2')->move('assets/destination_image', $newFileName);
            $destination->image_2 = $newFileName;
        }

        // Handle image_3
        if ($request->hasFile('image_3') && $request->file('image_3')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('image_3')->getClientOriginalExtension();
            $request->file('image_3')->move('assets/destination_image', $newFileName);
            $destination->image_3 = $newFileName;
        }

        // Handle image_4
        if ($request->hasFile('image_4') && $request->file('image_4')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('image_4')->getClientOriginalExtension();
            $request->file('image_4')->move('assets/destination_image', $newFileName);
            $destination->image_4 = $newFileName;
        }

        // Save the destination record to the database
        $destination->save();

        // Redirect or return response as needed
        return redirect()->route('dashboard.admin.article.index')->with('success', 'Destination created successfully!');
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
