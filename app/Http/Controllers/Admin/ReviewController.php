<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search keyword from input
        $search = $request->input('search');
    
        // Query users based on search keyword
        $reviewsQuery = Review::query();
    
        if ($search) {
            $reviewsQuery->where(function ($query) use ($search) {
                $query->where('content', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch users based on query
        $reviews = $reviewsQuery->paginate(5);
    
        return view('admin.dashboard.review.index', compact('reviews', 'search'));
    }

    public function publish(string $id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'published';
        $review->save();

        notify()->success('Review published successfully');
        return redirect()->back()->with('success', 'Review published successfully');
    }

    public function draft(string $id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'draft';
        $review->save();
    
        notify()->success('Review drafted successfully');
        return redirect()->back()->with('success', 'Review drafted successfully');
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
