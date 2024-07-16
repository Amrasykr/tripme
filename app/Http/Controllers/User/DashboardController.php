<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pending_reservation = Reservation::where('user_id', auth()->id())->where('status', 'pending')->count();
        $confirmed_reservation = Reservation::where('user_id', auth()->id())->where('status', 'confirmed')->count();
        $finished_reservation = Reservation::where('user_id', auth()->id())->where('status', 'finished')->count();
        return view ('user.dashboard.index', compact('pending_reservation', 'confirmed_reservation', 'finished_reservation'));
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
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated_data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user data
        if (isset($validated_data['name'])) {
            $user->name = $validated_data['name'];
        }
        if (isset($validated_data['email'])) {
            $user->email = $validated_data['email'];
        }

        // Handle image update
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($user->image) {
                $this->deletePublicImage($user->image, 'assets/user_image');
            }

            // Upload new image
            $newFileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('assets/user_image', $newFileName);
            $user->image = $newFileName;
        }

        // Save the updated user record
        $user->save();

        // Redirect with success message
        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
    }

    // Helper function to delete public image
    private function deletePublicImage($fileName, $folder)
    {
        $filePath = public_path("$folder/$fileName");
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
