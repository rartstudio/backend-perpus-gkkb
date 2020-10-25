<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RecommendationUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecommendationUserController extends Controller
{
    public function index(Request $request){
        $user = $request->user();

        $recommendation = RecommendationUser::where('user_id',$user->id)->get();
        return response()->json([
            'recommendation' => $recommendation
        ],200);
    }

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
