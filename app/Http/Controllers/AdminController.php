<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
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
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('admins.fotos', 'public');
        }

        Admin::create($data);
        return redirect()->route('admins.adminAdm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('admins.fotos', 'public');
        }

        $admin->update($data);
        return redirect()->route('admins.adminAdm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.adminAdm');
    }
}
