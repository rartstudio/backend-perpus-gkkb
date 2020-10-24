<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reviews\ReviewCollection;
use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\TransactionDetails\TransactionDetailsCollection;
use App\ReviewBooks;
use App\TransactionDetail;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index (Request $request)
    {
        $user = $request->user();
        
        $review = ReviewBooks::with('book','user')->where('user_id',$user->id)->orderBy('created_at','desc')->get();
        
        return new ReviewCollection($review);
    }

    public function unreview (Request $request)
    {
        $user = $request->user();
        $book = ReviewBooks::select('book_id')->distinct('book_id')->where('user_id',$user->id)->get();
        
        $book_id = [];

        //destructured data to array
        foreach($book as $k => $item){
            array_push($book_id,$book[$k]['book_id']);
        }

        $transaction = Transactions::select('id')->where('state',6)->where('user_id',$user->id)->get();

        $transaction_id = [];

        //destructured data to array
        foreach($transaction as $k => $item){
            array_push($transaction_id,$transaction[$k]['id']);
        }

        $details = TransactionDetail::select('book_id','state','qty')->whereIn('transaction_id',$transaction_id)->whereNotIn('book_id',$book_id)->groupBy('book_id','state','qty')->get();
        
        return new TransactionDetailsCollection($details);
    }

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

    public function destroy(Request $request, $id)
    {
        $review = ReviewBooks::find($id);

        $review->delete();
    }
}
