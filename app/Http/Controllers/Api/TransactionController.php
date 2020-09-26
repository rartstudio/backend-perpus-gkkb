<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function borrow ($id)
    {
        Transactions::where('id',$id)
            ->update([
                'state' => 5,
                'borrowed_at' => Carbon::now(),
                'returned_at' => Carbon::now()->addDays(14),
            ]);
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
