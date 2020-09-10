<?php

namespace App\Http\Controllers\Api;

use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesState\CategoriesStateCollection;
use Illuminate\Http\Request;

class CategoriesStateController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = CategoriesState::paginate(5);

        return new CategoriesStateCollection($data);
    }
}
