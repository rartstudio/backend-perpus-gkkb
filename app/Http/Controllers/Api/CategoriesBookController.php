<?php

namespace App\Http\Controllers\Api;

use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesBook\CategoriesBookCollection;
use App\Http\Resources\CategoriesBook\CategoriesBookResource;
use Illuminate\Http\Request;

class CategoriesBookController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = CategoriesBook::paginate(5);

        return new CategoriesBookCollection($data);
    }

    public function show (CategoriesBook $category_book) 
    {
        $data = CategoriesBook::find($category_book->id);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new CategoriesBookResource($data);
    }
}
