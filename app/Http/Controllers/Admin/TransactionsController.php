<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TransactionDetail;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function show($id){
        $item = TransactionDetail::with('book')->where('transaction_id','=',$id)->get();

        return view('admin.transactions.show',[
            'item' => $item
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
        return redirect()->route('admin.dashboard');
    }

    public function accepted(Request $request,$id)
    {
        Transactions::where('id',$id)->update(['state' => 2]);

        return redirect()->route('admin.dashboard');
    }

    public function rejected(Request $request, $id)
    {
        Transactions::where('id',$id)->update(['state' => 3]);

        return redirect()->route('admin.dashboard');
    }
}
