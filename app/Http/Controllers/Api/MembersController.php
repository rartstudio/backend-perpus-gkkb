<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Member\MemberResource;
use App\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function show (Members $member) 
    {
        //checking if data null
        if(is_null($member)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        //return new CategoriesBookResource($data);
        return new MemberResource($member);
    }
}
