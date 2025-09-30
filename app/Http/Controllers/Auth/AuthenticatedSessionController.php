<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View | RedirectResponse
    {
        if(Auth::guard('web_usuario')->check() || Auth::guard('web_admin')->check()){
            return redirect()->intended('dashboard1');
        }
        return view('login1');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if(auth('web_usuario')->attempt($request->only('email', 'password')))
            return redirect()->intended('dashboard1');
        else if(auth('web_admin')->attempt($request->only('email', 'password')))
            return redirect()->intended('dashboard1');

        return back()->withErrors('Credenciais inválidas. Tente novamente.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        Auth::guard('web_usuario')->logout();
        Auth::guard('web_admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login1');
    }
}
