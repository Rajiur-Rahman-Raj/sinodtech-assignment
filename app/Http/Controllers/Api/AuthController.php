<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (! auth()->attempt($request->only('email','password'))) {

            return response()->json([
                'message'=>'Invalid credentials'
            ],401);

        }

        $user = auth()->user();

        return response()->json([

            'token'=>$user
                ->createToken('ecommerce-api')
                ->plainTextToken

        ]);

    }
}
