<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role=Role::all();

        return response()->json($role, 200);
    }
    public function indexWeb()
    {
        $roles=Role::all();

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Role::create(['name'=>$request->input('name'), 'guard_name' => 'web']);
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Rol creado exitosamente'], 201);
        }
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
       //not necessary
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $role=Role::find($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Rol actualizado exitosamente'], 200);}
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $role=Role::find($id);
        $role->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Rol eliminado exitosamente'], 200);}
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
