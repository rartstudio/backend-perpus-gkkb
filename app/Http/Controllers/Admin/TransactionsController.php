<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TransactionDetail;
use App\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function show($id){
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();

        return view('admin.transactions.pages',[
            'item' => $item
        ]);
    }

    public function accepted(Request $request,$id)
    {
        Transactions::where('id',$id)->update(['state' => 2]);

        return redirect()->route('admin.dashboard')->with('success','Data transaksi berhasil diterima');
    }

    public function rejected(Request $request, $id)
    {
        Transactions::where('id',$id)->update(['state' => 3]);

        return redirect()->route('admin.dashboard')->with('danger','Data transaksi berhasil ditolak');
    }
}
