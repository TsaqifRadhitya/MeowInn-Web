<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class pethouseVerifyCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = Auth::user()->petHouses?->verificationStatus;
        if ($status === "disetujui") {
            return $next($request);
        }
        return redirect()->route("pethouse.dashboard")->with("error", "Harap Menyelesaikan Verifikasi Pethouse Sebelum Mengakses Fitur Tersebut");
    }
}
