<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class DataController extends Controller
{
    public function authors()
    {
        $authors = Authors::orderBy('author_name','ASC');

        return datatables()->of($authors)
                ->addColumn('action','admin.authors.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }
}
