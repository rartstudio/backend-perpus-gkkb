<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ReviewBooks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = new ReviewBooks;
        
        $user = $request->user();
        
        $review->user_id = $user->id;
        $review->book_id = $request->book_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->created_at = Carbon::now();

        $review->save();
        
        return response()->json('sukses',200);
    }
}
