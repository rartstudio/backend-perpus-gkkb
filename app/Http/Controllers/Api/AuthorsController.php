<?php

namespace App\Http\Controllers\Api;

use App\Authors;
use App\Http\Controllers\Controller;
use App\Http\Resources\Authors\AuthorCollection;
use App\Http\Resources\Authors\AuthorResource;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Authors::paginate(5);

        //convert to custom response
        return new AuthorCollection($data);

    }

    public function show(Authors $author) 
    {
        
        $data = Authors::find($author->id);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new AuthorResource($data);
    }
}
