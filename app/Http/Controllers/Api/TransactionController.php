<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() 
    {
        //get all data book
        $data = Transactions::paginate(5);

        // //convert to custom response
        // return new AuthorCollection($data);

    }
}
