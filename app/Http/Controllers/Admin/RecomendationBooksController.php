<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecomendationBooksController extends Controller
{
    public function index()
    {
        return view('admin.recommendation.index',
        [
            'title' => 'Recommendation Books'
        ]);
    }
}
