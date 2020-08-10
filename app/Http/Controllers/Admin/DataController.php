<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Publisher;
use Illuminate\Http\Request;



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
        $books = Books::select('id','title','qty','author_id','cover')->with('author')->orderBy('title','ASC');

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
                //->rawColumns(['action'])
                ->toJson();
    }
}
