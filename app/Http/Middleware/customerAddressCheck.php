<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customerAddressCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->address !== null && $request->user()->villagId !== null) {
            return $next($request);
        }
        return redirect()->route('customer.profile.edit')->with('error','Harap mengisi alamat sebelum melakukan penitipan');
    }
}
