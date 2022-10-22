<?php

namespace App\Http\Middleware;

use Closure;

class OpenPdfInBrowser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="file.pdf"');
    }
    }
