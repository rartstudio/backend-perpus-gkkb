<?php

namespace App\Http\Controllers\Api;

use App\Books;
use App\Http\Controllers\Controller;
use App\Http\Resources\Books\BookCollection;
use App\Http\Resources\Books\BookResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Books::with(['author','categories_book','publisher'])->paginate(5);

        return new BookCollection($data);
    }

    public function show (Books $book) 
    {
        $data = Books::find($book->id);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new BookResource($data);
    }
}
