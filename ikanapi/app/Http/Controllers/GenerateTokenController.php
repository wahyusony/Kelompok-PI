<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GenerateTokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $user = $request->user();
        
        // Cek apakah user sudah memiliki token
        if (!empty($user->api_token)) {
            return redirect()->route('home')->with('token', $user->api_token)->with('message', 'Anda Sudah Menggenerate API');
        }
        
        $token = Str::random(64);
        
        $user->api_token = $token;
        $user->save();
        
        return redirect()->route('home')->with('token', $token);
    }

    public function showToken()
    {
        $user = auth()->user();
        if (!$user->api_token) {
            return response()->json(['message' => 'Token does not exist'], 404);
        }

        return response()->json(['api_token' => $user->api_token]);
    }

    public function deleteToken()
    {
        $user = auth()->user();
        if (!$user->api_token) {
            return response()->json(['message' => 'Token does not exist'], 404);
        }

        $user->update(['api_token' => null]);

        return response()->json(['message' => 'Token has been deleted']);
    }
}

