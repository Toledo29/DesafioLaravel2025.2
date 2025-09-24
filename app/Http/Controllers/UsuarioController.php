<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $user = new Usuario($data);
        $user->save();

        return redirect()->route('usuarios.usuariosAdm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {

        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        if (!empty($data['senha'])) {
        $data['senha'] = bcrypt($data['senha']);
        } else {
        unset($data['senha']);
        }
        
        $usuario->update($data);

        if(auth()->guard('web_admin')->check()){
            return redirect()->route('usuarios.usuariosAdm')->with('success', 'Usuário atualizado com sucesso!');
        } else {
            return redirect()->route('usuarios.show', $usuario)->with('success', 'Seu perfil foi atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        if(auth()->guard('web_admin')->check()){
            return redirect()->route('usuarios.usuariosAdm')->with('success', 'Usuário deletado com sucesso!');
        } else {
            return redirect()->route('login1')->with('success', 'Seu perfil foi deletado com sucesso!');
        }
    }
}
