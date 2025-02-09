<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    $url = $request->getRequestUri();

    if (substr($url, -1) === '/' && $url !== '/') {
        return redirect(rtrim($url, '/'), 301);
    }
        return $next($request);
    }
}