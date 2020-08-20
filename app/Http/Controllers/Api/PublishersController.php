<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publishers\PublishersCollection;
use App\Http\Resources\Publishers\PublishersResource;
use App\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Publisher::paginate(5);

        return new PublishersCollection($data);
    }

    public function show (Publisher $publisher) 
    {
        $data = Publisher::find($publisher->id);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new PublishersResource($data);
    }
}
