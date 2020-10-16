<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Members;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        //create data user to table users
        $user = User::create($validatedData);
        
        //
        $slug= Str::slug($validatedData['name']);

        //adding data user to table members to providing edit member form
        Members::create(['user_id' => $user->id, 'is_verified' => 0, 'slug' => $slug, 'submission' => 0]);

        $user->assignRole('user');

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function forgot(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'email tidak terdaftar'
            ],503);
        }

        $member = Members::where('user_id',$user->id);

        if(!$member){
            return response()->json([
                'status' => 'error',
                'message' => 'Data Member tidak tersedia'
            ],409);
        }

        if($member->date_of_baptism != $request->date_of_baptism || $member->member_code != $request->member_code) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Tidak sesuai'
            ],403);
        }

        return response()->json([
            'status' => 'sukses',
            'data' => $member
        ]);
    }

    public function reset(Request $request)
    {
        if($request->password != $request->password_confirmation){
            return response()->json([
                'status' => 'error',
                'message' => 'Password dam Konfirmasi Password tidak sama'
            ]);
        }

        User::where('email',$request->email)->update([
            'password' => $request->password
        ]);

        return response()->json([
            'status' => 'sukses',
            'message' => 'Password Berhasi diubah'
        ],200);
    }
}
