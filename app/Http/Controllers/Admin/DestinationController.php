<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search keyword from input
        $search = $request->input('search');
    
        // Query destinations based on search keyword
        $destinationsQuery = Destination::query();
    
        if ($search) {
            $destinationsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('address', 'like', '%' . $search . '%')
                      ->orWhere('category', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch destinations based on query
        $destinations = $destinationsQuery->paginate(5);
    
        return view('admin.dashboard.destination.index', compact('destinations', 'search'));
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
            'content' => 'required',
        ]);

        $destination = new Destination([
            'name' => $validated_data['name'],
            'description' => $validated_data['description'],
            'address' => $validated_data['address'],
            'address_url' => $validated_data['address_url'],
            'category' => $validated_data['category'],
            'content' => $validated_data['content'],
        ]);

        // Handle main image
        if ($request->hasFile('tumbnail') && $request->file('tumbnail')->isValid()) {
            $newFileName = uniqid() . '.' . $request->file('tumbnail')->getClientOriginalExtension();
            $request->file('tumbnail')->move('assets/tumbnail_image', $newFileName);
            $destination->main_image = $newFileName;
        } else {
            $destination->main_image = 'default-thumbnail.png';
        }

        // Handle other images
        $imageFields = ['image_1', 'image_2', 'image_3', 'image_4'];
        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
                $newFileName = uniqid() . '.' . $request->file($fieldName)->getClientOriginalExtension();
                $request->file($fieldName)->move('assets/destination_image', $newFileName);
                $destination->{$fieldName} = $newFileName;
            }
        }

        // Save the destination record to the database
        $destination->save();

        if ($destination) {
            notify()->success(message: 'Destination Created Successfully');
            return redirect()->route('admin.dashboard.destination');
        } else {
            notify()->error(message: 'Failed to create destination');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $destination = Destination::find($id);
        return view('admin.dashboard.destination.show', compact('destination'));
    }

    public function edit(string $id)
    {
        $destination = Destination::find($id);
        return view('admin.dashboard.destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'address_url' => 'required',
            'category' => 'required',
            'tumbnail' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image_1' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image_2' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image_3' => 'image|mimes:jpeg,png,jpg|max:1048',
            'image_4' => 'image|mimes:jpeg,png,jpg|max:1048',
            'content' => 'required',
        ]);

        // Find the destination record by ID
        $destination = Destination::findOrFail($id);

        // Update destination data
        $destination->name = $validated_data['name'];
        $destination->description = $validated_data['description'];
        $destination->address = $validated_data['address'];
        $destination->address_url = $validated_data['address_url'];
        $destination->category = $validated_data['category'];
        $destination->content = $validated_data['content'];

        // Handle main image update
        if ($request->hasFile('tumbnail') && $request->file('tumbnail')->isValid()) {
            // Delete old main image if exists
            $this->deletePublicImage($destination->main_image, 'assets/tumbnail_image');

            // Upload new main image
            $newFileName = uniqid() . '.' . $request->file('tumbnail')->getClientOriginalExtension();
            $request->file('tumbnail')->move('assets/tumbnail_image', $newFileName);
            $destination->main_image = $newFileName;
        }

        // Handle other images update
        $imageFields = ['image_1', 'image_2', 'image_3', 'image_4'];
        foreach ($imageFields as $fieldName) {
            if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
                // Delete old image if exists
                $this->deletePublicImage($destination->{$fieldName}, 'assets/destination_image');

                // Upload new image
                $newFileName = uniqid() . '.' . $request->file($fieldName)->getClientOriginalExtension();
                $request->file($fieldName)->move('assets/destination_image', $newFileName);
                $destination->{$fieldName} = $newFileName;
            }
        }

        // Save the updated destination record
        $destination->save();

        if ($destination) {
            notify()->success(message: 'Destination Updated Successfully');
            return redirect()->route('admin.dashboard.destination');
        } else {
            notify()->error(message: 'Failed to Update Destination');
            return redirect()->back()->withInput();
        }
    }

    // Helper function to delete public images
    private function deletePublicImage($fileName, $directory)
    {
        $filePath = public_path($directory . '/' . $fileName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the destination by ID (assuming Eloquent model)
        $destination = Destination::find($id);

        // Delete main image
        if ($destination->main_image && $destination->main_image != 'default-thumbnail.png') {
            $mainImagePath = public_path('assets/tumbnail_image/' . $destination->main_image);
            if (File::exists($mainImagePath)) {
                File::delete($mainImagePath);
            }
        }

        // Delete other images (adjust based on your fields)
        $imageFields = ['image_1', 'image_2', 'image_3', 'image_4'];
        foreach ($imageFields as $fieldName) {
            if ($destination->{$fieldName}) {
                $imagePath = public_path('assets/destination_image/' . $destination->{$fieldName});
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }

        // Optionally, delete the record from database
        $destination->delete();

        if ($destination) {
            notify()->success(message: 'Destination Deleted Successfully');
            return redirect()->route('admin.dashboard.destination');
        } else {
            notify()->error(message: 'Failed to Delete Destination');
            return redirect()->back()->withInput();
        }
    }
}
