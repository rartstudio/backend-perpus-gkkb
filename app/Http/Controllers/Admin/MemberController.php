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
    public function index()
    {
        return view('admin.member.index');
    }

    public function show($id){
        $item = Members::with('user')->where('user_id','=',$id)->get();

        return view('admin.member.show',[
            'item' => $item
        ]);
    }

    public function messageForm($id)
    {
        $user = User::where('id',$id)->get();
        return view('admin.member.message',[
            'user' => $user
        ]);
    }

    public function message(Request $request)
    {
        $admin_id = Auth::user()->id;

        Messages::create([
            'user_id' => $request->id,
            'header' => 'Verifikasi User',
            'message' => $request->message,
            'admin_id' => $admin_id
        ]);
        
        return redirect()->route('admin.member-index');
    }

    public function submission($id)
    {
        //accepting user submission
        Members::where('user_id',$id)->update(['submission' => 2]);
        
        //change verified to 1 
        Members::where('user_id',$id)->update(['is_verified' => 1]);

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
            'header' => 'Verifikasi User',
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
