<?php

namespace App\Http\Middleware;

use App\Http\Controllers\roleConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $userLogin = Auth::user();
        if ($userLogin->role !== roleConstant::ADMIN) {
            abort(403);
        }
        return $next($request);
    }
}
