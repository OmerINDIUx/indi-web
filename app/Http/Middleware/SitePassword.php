<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SitePassword
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('site_access_granted', false)) {
            return $next($request);
        }

        return redirect()->guest(route('site.access'));
    }
}
