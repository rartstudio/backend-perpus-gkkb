<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\StockMaster;
use App\StockTrxReturn;
use App\TransactionDetail;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function show($id){
        $transaction = Transactions::where('id',$id)->get();
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();

        return view('admin.transactions.show',[
            'item' => $item,
            'transaction' => $transaction
        ]);
    }

    public function ReadyForm($id){
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();
        $data = Transactions::with('users','users.members')->where('id',$id)->get();

        return view('admin.transactions.EditReadyForm',[
            'datas' => $data,
            'item' => $item
        ]);
    }

    public function storeReadyForm(Request $request, $id)
    {
        Transactions::where('id',$id)
            ->update([
                'state' => $request->state,
                // 'borrowed_at' => Carbon::now(),
                // 'returned_at' => Carbon::now()->addDays($request->long),
                'add_info' => $request->add_info
            ]);
        TransactionDetail::where('transaction_id',$id)->update(['state' => 4]);
        return redirect()->route('admin.dashboard');
    }

    public function RejectForm($id){
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();
        $data = Transactions::with('users','users.members')->where('id',$id)->get();

        return view('admin.transactions.EditRejectForm',[
            'datas' => $data,
            'item' => $item
        ]);
    }

    public function storeRejectForm(Request $request, $id)
    {
        Transactions::where('id',$id)
            ->update([
                'state' => $request->state,
                'add_info' => $request->add_info
            ]);
            
        TransactionDetail::where('transaction_id',$id)->update(['state' => 3]);
        return redirect()->route('admin.dashboard');
    }

    public function accepted($id)
    {
        Transactions::where('id',$id)->update(['state' => 2]);
        TransactionDetail::where('transaction_id',$id)->update(['state' => 2]);

        return redirect()->route('admin.dashboard');
    }

    public function returned($id)
    {
        //get how many data in details
        $details = TransactionDetail::where('transaction_id',$id)->get();
        $transaction = Transactions::where('id',$id)->get();

        //input data to stock_trx_return
        foreach($details as $k => $item){
            //dont use the item cause we will insert trx id on current loop
            $details[$k]['add_info'] = $transaction[0]->transaction_code;
            $details[$k]['created_at'] = Carbon::now()->format('Y-m-d h:i:s');
            $details[$k]['updated_at'] = Carbon::now()->format('Y-m-d h:i:s');
            unset($details[$k]['state']);
            unset($details[$k]['id']);
        }

        //updating data returned , state and returned at
        Transactions::where('id',$id)->update(['state' => 6, 'qty_returned' => count($details),'returned_at' => Carbon::now() ]);

        //updating state in transaction detail
        TransactionDetail::where('transaction_id',$id)->update(['state' => 6]);

        //save it to transaction detail
        StockTrxReturn::insert(json_decode($details,true));


        //updating stock master data
        foreach($details as $k => $item){
            
            //get data from stock master
            $book = StockMaster::where('book_id',$details[$k]['book_id'])->get();

            //do calculate
            $previousReturn = $book[0]['trx_return'] + $details[$k]['qty'];
            $finalEnding = ($book[0]['beginning'] + $book[0]['trf_in'] + $previousReturn) - ($book[0]['trx_out'] + $book[0]['trx_borrow']);
            
            //updating to stockmaster
            StockMaster::where('book_id',$details[$k]['book_id'])->update(['trx_return' => $previousReturn, 'ending' => $finalEnding]);
        }

        return redirect()->route('admin.transactions-borrow');
    }

    public function rejected($id)
    {
        Transactions::where('id',$id)->update(['state' => 3]);
        TransactionDetail::where('transaction_id',$id)->update(['state' => 3]);

        return redirect()->route('admin.dashboard');
    }

    public function borrow(){
        return view('admin.transactions.borrow',[
            'title'=> 'Daftar Transaksi Pinjam'
        ]);
    }

    public function reject()
    {
        return view('admin.transactions.reject',[
            'title'=> 'Daftar Transaksi Tolak'
        ]);
    }

    public function return()
    {
        return view('admin.transactions.return',[
            'title'=> 'Daftar Transaksi Kembali'
        ]);
    }
}
