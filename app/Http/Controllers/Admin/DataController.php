<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
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
}
