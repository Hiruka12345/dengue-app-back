<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        return rescue(function () use ($request){
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'location' => 'required|string|min:8',
                'contact_no' => 'required|numeric',
                'NIC' => 'required|string',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'location' => $request->location,
                'contact_no' => $request->contact_no,
                'NIC' => $request->NIC,
                'permissions' => 'Customer',
            ]);

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
            ], 200);
        }, function ($exception) {
            return response()->json([
                'message' => 'Failed to register user',
                'error' => $exception->getMessage(),
            ], 500);
        });
    }

    public function LoginUser(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();

        if ($user && Hash::check($password, $user->password)){
            return response()->json([
                'message' => 'Login successful', 'user' => $user
            ], 200);
        }else
        {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 500);
        }
    }
}
