<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class bajaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = ($request->email) ? User::where('email', $request->email)->first() : $user = Auth::user();

        if ($user->baja == 0) {
            return $next($request);
        }

        return response()->json([
            'data' => null,
            'message' => ($user == null) ? 'Comprueba tus credenciales' : 'Tu usuario a sido dado de baja',
        ], 401);
    }
}
