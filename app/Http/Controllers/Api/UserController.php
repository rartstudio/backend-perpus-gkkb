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

        // $data = User::with(['members','transactions','transaction_details.transa'])->find($user->id);

        //get transaction details using transactions relation on user and transaction details in transaction
        $data = User::with(['members','transactions','transactions.transaction_details','transactions.transaction_details.book'])->find($user->id);

        return new AuthResource($data);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $members = Members::where('user_id',$user->id);

        $members->update([
            'address' => $request->address,
            'date_of_birth' => date('Y-m-d',strtotime($request->date_of_birth)),
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'no_cst' => $request->no_cst
        ]);

        return response()->json([
            "message" => "sukses input data",
            "status_code" => 200
        ],200);
    }

    public function submission(Request $request)
    {
        $user = $request->user();

        $members = Members::where('user_id',$user->id);

        $members->update([
            'submission' => $request->submission
        ]);

        return response()->json([
            "message" => "sukses input data",
            "status_code" => 200
        ],200);
    }
}
