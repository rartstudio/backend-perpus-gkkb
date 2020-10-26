<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\TransactionDetails\TransactionDetailsCollection;
use App\Members;
use App\RecommendationUser;
use App\TransactionDetail;
use App\Transactions;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

//import storage
use Illuminate\Support\Facades\Storage;
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
            'date_of_baptism' => date('Y-m-d',strtotime($request->date_of_baptism)),
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

    public function uploadImage(Request $request)
    {
        $user = $request->user();

        $members = Members::where('user_id',$user->id);

        //set default null if user dont submit a cover image
        $cover = null;

        //checking if user pass a file cover image
        if($request->hasFile('image')){
            // Storage::delete($members->image);
            $cover = $request->file('image')->store('assets/covers');
        }

        $members->update([
            'image' => $cover
        ]);

        return response()->json([
            "message" => "sukses input data",
            "status_code" => 200
        ],200);
    }

    public function detailBook(Request $request)
    {   
        $user = $request->user();

        //status
        $state= ['5','6'];

        $transactions = Transactions::select('id')->where('user_id',$user->id)->whereIn('state',$state)->get();

        $transactionsId = [];

        foreach($transactions as $k => $item){
            array_push($transactionsId,$transactions[$k]['id']);
        }

        $details = TransactionDetail::whereIn('transaction_id',$transactionsId)->get();

        return new TransactionDetailsCollection($details);
    }

    public function borrow(Request $request)
    {
        $user = $request->user();

        $transaction = Transactions::select('id')->where('state',6)->where('user_id',$user->id)->get();

        $transaction_id = [];

        //destructured data to array
        foreach($transaction as $k => $item){
            array_push($transaction_id,$transaction[$k]['id']);
        }

        $details = TransactionDetail::with('book.review')->select('book_id','state','qty')->whereIn('transaction_id',$transaction_id)->groupBy('book_id','state','qty')->get();

        return new TransactionDetailsCollection($details);
    }
}
