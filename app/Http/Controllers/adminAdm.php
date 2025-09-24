<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class adminAdm extends Controller
{
    public function __invoke(){
        $adminLogado = auth('web_admin')->user();
        $admins = Admin::where('id', $adminLogado->id)->orWhere('criador_id', $adminLogado->id)->get();
        return view('admins.adminAdm' , compact('admins'));
    }
}
