<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\StockMaster;
use App\StockTrxBorrow;
use App\TransactionDetail;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Transactions::paginate(5);

        // //convert to custom response
        // return new AuthorCollection($data);

    }

    public function store(Request $request)
    {
        //using this cause we will using save function
        $transaction = new Transactions;

        //get user data to take id
        $user = $request->user();

        //get all request 
        $allItem = $request->all();

        //set random number for random code trx
        $randomNumber = rand(10000,99999).''.rand(100,999);

        //state 1 = waited, 2 = accept , 3 = reject , 4 = ready , 5 = borrow , 6 = returned
        $transaction->user_id = $user->id;
        $transaction->transaction_code = 'GKKB-TRX-'.''.$randomNumber;
        $transaction->state = 1;
        $transaction->qty_borrow = count($allItem);
        $transaction->qty_returned = 0;
        $transaction->created_at = Carbon::now();

        //save data
        $transaction->save();
        
        foreach($allItem as $k => $item){
            //dont use the item cause we will insert trx id on current loop
            $allItem[$k]['transaction_id'] = $transaction->id;
        }

        //save it to transaction detail
        TransactionDetail::insert($allItem);

        return response()->json('sukses',200);
    }

    public function borrow (Request $request,$id)
    {
        //get all request 
        $allItem = $request->all();

        //get details data
        $details = TransactionDetail::where('transaction_id',$id)->get();

        //structured data for stock_trx_borrow
        foreach($allItem as $k => $item){
            //dont use the item cause we will insert trx id on current loop
            // $allItem[$k]['add_info'] = $transaction->transaction_code;
            $allItem[$k]['created_at'] = Carbon::now();
            $allItem[$k]['updated_at'] = Carbon::now();
        }

        //updating data of transactions
        Transactions::where('id',$id)
            ->update([
                'state' => 5,
                'borrowed_at' => Carbon::now(),
                'returned_at' => Carbon::now()->addDays(14),
            ]);

        //updating data of transactions details 
        TransactionDetail::where('transaction_id',$id)
            ->update([
                'state' => 5
            ]);

        //save it to stock_trx_borrow
        StockTrxBorrow::insert($allItem);

        //updating stock master data
        foreach($details as $k => $item){
    
            //get data from stock master
            $book = StockMaster::where('book_id',$details[$k]['book_id'])->get();

            //do calculate
            $previousBorrow = $book[0]['trx_borrow'] + $details[$k]['qty'];
            $finalEnding = ($book[0]['beginning'] + $book[0]['trf_in'] + $book[0]['trx_return']) - ($book[0]['trx_out'] + $previousBorrow);
            
            //updating to stockmaster
            StockMaster::where('book_id',$details[$k]['book_id'])->update(['trx_borrow' => $previousBorrow, 'ending' => $finalEnding]);
        }

        return response()->json('sukses',200);
    }

    // public function store(Request $request)
    // {

    //     $user = $request->user();
    //     $item = $request->all();
    //     $data = [];
    //     $randomNumber = rand(10000,99999).''.rand(100,999);

    //     $data['user_id'] = $user->id;
    //     $data['transaction_code'] = 'GKKB-TRX-'.''.$randomNumber;
    //     $data['state'] = 1;
    //     $data['qty_borrow'] = count($item);
    //     $data['qty_returned'] = 0;
    //     $data['created_at'] = Carbon::now();

    //     $transaction = Transactions::insert($data);

    //     for($i=0; $i < count($item) ; $i++) {
    //         $item[$i] = 'transaction_id :'.''.$transaction->id;
    //     }

    //     TransactionDetail::insert($item);

    //     return response()->json('sukses',200);
    // }
}
