<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find($request->route('user_id'));

        if ($user && $user->hasRole('Admin')) {
            return $next($request);
        }

        return response()->json([
            'data' => null,
            'message' => 'No tienes permiso para estar aqui',
        ], 401);
    }
}
