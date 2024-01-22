<?php

// app/Http/Controllers/EquipoController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Inertia\Inertia;



class EquipoController extends Controller
{

    public function index()
    {
        $equipos = Equipo::all();
        
        return Inertia::render('Equipos/Index', [
            'equipos' => $equipos
        ]);
    }

    public function print()
    {
        $equipos = Equipo::all();
        
        return Inertia::render('Equipos/Print', [
            'equipos' => $equipos
        ]);
    }

    public function show(Equipo $equipo)
    {
        $equipos = Equipo::all();

        return Inertia::render('Equipos/Show', [
            'equipo' => $equipo
        ]);
    }

    public function create()
    {
        return Inertia::render('Equipos/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'n_serie' => 'required|unique:equipos',
        ]);

        Equipo::create($validatedData);
        return redirect()->route('equipos.index');
    }

    public function edit(Equipo $equipo)
    {
        return Inertia::render('Equipos/Edit', [
            'equipo' => $equipo
        ]);
    }

    public function update(Request $request, Equipo $equipo)
    {
        $validatedData = $request->validate([
            'n_serie' => 'required|unique:equipos,n_serie,'.$equipo->id,
        ]);

        $equipo->update($validatedData);
        return redirect()->route('equipos.index');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index');
    }
}
