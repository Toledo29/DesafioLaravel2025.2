<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('admins.email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'mensagem' => ['required', 'string'],
        ]);

        Mail::to($request->email)->send(new \App\Mail\EmailAdmin($request->mensagem));

        return back()->with('success', 'Email enviado com sucesso!');
    }
}
