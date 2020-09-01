<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request) 
    {
        $user = $request->user();
        return new AuthResource($user);
    }
}
