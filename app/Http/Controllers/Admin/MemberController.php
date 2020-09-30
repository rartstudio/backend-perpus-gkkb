<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Members;
use Illuminate\Http\Request;

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
}
