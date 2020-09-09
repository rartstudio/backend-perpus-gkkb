<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Members;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request) 
    {
        $user = $request->user();

        $data = User::with(['members'])->find($user->id);

        return new AuthResource($data);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $members = Members::where('user_id',$user->id);

        $members->update([
            'address' => $request->address,
            'phone_number' => $request->phoneNumber
        ]);

        return response()->json([
            "message" => "sukses input data",
            "status_code" => 200
        ],200);
    }
}
