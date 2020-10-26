<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RecommendationUser;
use Carbon\Carbon;
use App\Books;
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

        Books::where('id',$request->book_id)->update([
            'is_recommendation_user' => 1,
        ]);
        
        return response()->json('sukses',200);
    }

    public function destroy (Request $request,$id)
    {
        $user = $request->user();

        $recommendation = RecommendationUser::where('user_id',$user->id)->where('book_id',$id);

        $recommendation->delete();

        $book_id = RecommendationUser::where('book_id',$id)->get();

        dd($book_id);

        if(!$book_id){
            Books::where('id',$id)->update([
                'is_recommendation_user' => 0
            ]);
        }

        return response()->json('sukses',200);
    }
}
