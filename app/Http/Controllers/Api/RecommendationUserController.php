<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RecommendationUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecommendationUserController extends Controller
{
    public function store (Request $request)
    {
        $recommendation = new RecommendationUser;
        
        $user = $request->user();
        
        $recommendation->user_id = $user->id;
        $recommendation->book_id = $request->book_id;
        $recommendation->created_at = Carbon::now();

        $recommendation->save();
        
        return response()->json('sukses',200);
    }
}
