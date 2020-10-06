<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Messages\MessageCollection;
use App\Http\Resources\Messages\MessageResource;
use App\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request) 
    {
        $user = $request->user();

        // $data = User::with(['members','transactions','transaction_details.transa'])->find($user->id);

        //get transaction details using transactions relation on user and transaction details in transaction
        $data = Messages::with(['user','user.members'])->where('user_id',$user->id)->get();

        //dd($data);

        return new MessageCollection($data);
    }

    public function isRead(Request $request, $id)
    {
        $user = $request->user();

        $message = Messages::where('user_id','=',$user)->where('id',$id)
            ->update([
                'is_read' => 1,
            ]);

        return response()->json($message,200);
    }
}
