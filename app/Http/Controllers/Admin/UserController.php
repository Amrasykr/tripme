<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search keyword from input
        $search = $request->input('search');
    
        // Query users based on search keyword
        $usersQuery = User::where('role', 'user');
    
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch users based on query
        $users = $usersQuery->paginate(5);
    
        return view('admin.dashboard.user.index', compact('users', 'search'));
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
        // Find the user by ID
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('admin.dashboard.user')->with('error', 'User not found.');
        }
    
        // Delete user's image if it exists
        if ($user->image) {
            $imagePath = public_path('user_image/' . $user->image);
    
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
    
        // Delete the user record
        $user->delete();
    
        if ($user) {
            notify()->success(message: 'User Deleted Successfully');
            return redirect()->route('admin.dashboard.user');
        } else {
            notify()->error(message: 'User to Delete user');
            return redirect()->back()->withInput();
        }
    }
    
}
