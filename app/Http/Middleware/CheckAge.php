<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        $age = Carbon::parse($request->date_of_birth)->age;

        if ($age < 18) {
            return redirect('/register')
                ->with('error', 'You must be at least 18 years old to register.');
        }

        return $next($request);
    }
}
