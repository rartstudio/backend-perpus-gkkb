<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TransactionDetail;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function show($id){
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();

        return view('admin.transactions.pages',[
            'item' => $item
        ]);
    }
}
