<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role == 'admin') {
            // jika level admin, maka hanya boleh akses route cekdatapasien dan postdatapasien
            if (in_array($request->route()->getName(), ['admin.index', 'admin.create', 'admin.store'])) {
            // if ($request->route()->getName() == 'judulall') {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } elseif ($user->role == 'superadmin') {
            return $next($request);
        } elseif ($user->role == 'dokter') {
            // jika level kasir, maka hanya boleh akses route yang diizinkan
            if (in_array($request->route()->getName(), ['dokter.index', 'dokter.create', 'dokter.store'])) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } elseif ($user->role == 'kasir') {
            // jika level dokter, maka hanya boleh akses route yang diizinkan
            if (in_array($request->route()->getName(), ['kasir.index', 'kasir.bayar', 'kasir.bayar.post', 'kasir.rekapitulasi'])) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } else {
            return redirect()->back()->with('error', 'Level tidak valid');
        }
    }
}
