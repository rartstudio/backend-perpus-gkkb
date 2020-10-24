<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecomendationBooks\RecomendationBookCollection;
use App\RecomendationBooks;
use Illuminate\Http\Request;

class RecomendationBooksController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = RecomendationBooks::with(['book','book.review'])->paginate(5);

        return new RecomendationBookCollection($data);
    }
}
