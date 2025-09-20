<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        /** @var \App\Models\Usuario $user */
        $user = auth()->guard('web_usuario')->user();

        $user->produtos()->create($request->validated());
        return redirect()->route('produtos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $this->authorize('update', $produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $this->authorize('update', $produto);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
