<?php

namespace App\Http\Controllers\Admin;

use App\Books;
use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Members;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $book = Books::count();
        $categories_book = CategoriesBook::count();
        $members = Members::count();
        $process = Transactions::with('users','transaction_details','transaction_details.book')->whereIn('state',array(1,2))->get();

        // dd($process);
        return view('admin.home', [
            'book' => $book,
            'categories_book' => $categories_book,
            'members' => $members,
            'process' => $process,
        ]);
    }

    public function profile(){
        $user = Auth::user();

        $member = Members::with(['user'])->find($user->id);

        return view('admin.profile.index',
        [
            'data' => $user,
            'member' => $member
        ]);
    }

    public function details(){
        
    }
}
