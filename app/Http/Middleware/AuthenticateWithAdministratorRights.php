<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithAdministratorRights
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        if (auth()->user()->admin) {
            return $next($request);
        } else abort(Response::HTTP_FORBIDDEN);
    }
}
