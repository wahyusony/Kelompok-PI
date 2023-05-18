<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OnceApiToken
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->api_token) {
            return response()->json(['message' => 'API token has already been generated'], 422);
        }

        return $next($request);
    }
}
