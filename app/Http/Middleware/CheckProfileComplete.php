<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\informations;

class CheckProfileComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $profile = informations::where('u_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('information')->with('error', 'Please complete your profile.');
        }

        return $next($request);
    }
    
}
