<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::broker('usuarios')->sendResetLink(
            $request->only('email')
        );

        if($status == Password::RESET_LINK_SENT){
            return back()->with('status', __($status));
        }

        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        if($status == Password::RESET_LINK_SENT){
            return back()->with('status', __($status));
        }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        

        return back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
