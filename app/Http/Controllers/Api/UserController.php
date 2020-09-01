<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request) 
    {
        
        $data = $request->user();

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new AuthResource($data);
    }
}
