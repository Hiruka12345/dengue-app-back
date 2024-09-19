<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class MagicLinkController extends Controller
{
    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $url = URL::temporarySignedRoute(
            'magic.login', now()->addMinutes(30), ['user' => $user->id]
        );

        Mail::raw("Click here to login: {$url}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your Magic Login Link');
        });

        return response()->json(['message' => 'Magic link sent!']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
        ]);

        if (! $request->hasValidSignature()) {
            return response()->json(['message' => 'Invalid or expired link.'], 401);
        }

        $user = User::findOrFail($request->user);

        $token = $user->createToken('magic-link-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'required|array',
        ]);

        $UserAdmin = new User();
        $UserAdmin->name = $request->name;
        $UserAdmin->email = $request->email;
        $UserAdmin->location = $request->location;
        $UserAdmin->password = Hash::make($request->password);
        $UserAdmin->permissions = implode(',', $request->permissions); // Store as comma-separated values
        $UserAdmin->save();

        return redirect()->back()->with('success', 'Sub-Admin added successfully!');
    }
}
