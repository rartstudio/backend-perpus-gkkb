<?php

namespace App\Http\Controllers\Api;

use App\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Books::all();

        return response()->json($data,200);
    }

    public function show (Books $book) 
    {
        $data = Books::find($book->slug);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ]);
        }
    }
}
