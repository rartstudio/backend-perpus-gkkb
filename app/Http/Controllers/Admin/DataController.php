<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\CategoriesBook;
use App\Http\Controllers\Controller;
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

    public function categories_book()
    {
        $categories_books = CategoriesBook::orderBy('cbo_name','ASC');

        return datatables()->of($categories_books)
                ->addColumn('action','admin.categories_book.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }
}
