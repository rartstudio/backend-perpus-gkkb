<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Members;
use App\Messages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function show($id){
        $item = Members::with('user')->where('user_id','=',$id)->get();

        return view('admin.member.show',[
            'item' => $item
        ]);
    }

    public function submission($id)
    {
        Members::where('user_id',$id)->update(['submission' => 2]);

        return redirect()->route('admin.dashboard');
    }

    public function rejectedForm($id)
    {
        $user = User::where('id',$id)->get();
        return view('admin.member.reject',[
            'user' => $user
        ]);
    }

    public function rejected(Request $request)
    {
        $admin_id = Auth::user()->id;

        Messages::create([
            'user_id' => $request->id,
            'message' => $request->message,
            'admin_id' => $admin_id
        ]);

        Members::where('user_id',$request->id)
            ->update([
                'submission' => 0
            ]);
        

        return redirect()->route('admin.dashboard');
    }
}
