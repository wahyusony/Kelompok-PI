<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class GenerateTokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $user = $request->user();
        $token = Str::random(60);
        $user->api_token = $token;
        $user->save();

        $tokens = User::whereNotNull('api_token')->where('id', $user->id)->get();

        return view('home', compact('tokens'))->with('status', 'API token has been generated.');
    }
}
