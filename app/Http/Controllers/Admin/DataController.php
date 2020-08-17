<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Members;
use App\Publisher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function authors()
    {
        $authors = Authors::orderBy('author_name','ASC');

        return datatables()->of($authors)
                ->addColumn('action','admin.author.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function publishers()
    {
        $publishers = Publisher::orderBy('pub_name','ASC');

        return datatables()->of($publishers)
                ->addColumn('action','admin.publisher.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function categories_book()
    {
        $categories_books = CategoriesBook::orderBy('cbo_name','ASC');

        return datatables()->of($categories_books)
                ->addColumn('action','admin.categories_book.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function categories_state()
    {
        $categories_state = CategoriesState::orderBy('cst_name','ASC');

        return datatables()->of($categories_state)
                ->addColumn('action','admin.categories_state.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function books()
    {
        $books = Books::select('id','title','qty','author_id','cover','slug')->with('author')->orderBy('title','ASC');

        return datatables()->of($books)
                ->addColumn('author', function(Books $model){
                    return $model->author->author_name;
                })
                ->editColumn('cover', function(Books $model){
                    return '<img src="'.$model->getCover().'" height="150px">';
                })
                ->addColumn('action','admin.book.action')
                ->addIndexColumn()
                ->rawColumns(['cover','action'])
                ->toJson();
    }

    public function members()
    {
        $members = Members::select('id','member_code',DB::raw("CONCAT(first_name,' ',last_name) as full_name"),'slug','gender','cst_id')->with('category_state')->orderBy('member_code', 'ASC');

        return datatables()->of($members)
            //if we use concat add filter column in below
            ->filterColumn('full_name', function($query, $keyword) {
                $sql = "CONCAT(first_name,'-',last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('category_state',function(Members $model){
                return $model->category_state->cst_name;
                })
            ->addColumn('action','admin.member.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
