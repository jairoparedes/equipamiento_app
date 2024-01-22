<?php

// app/Http/Controllers/EquipoUserController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\EquipoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipoUserController extends Controller
{

    public function index()
    {
        //unir equipoUser con equipo y user
        $equipoUsers = EquipoUser::with(['equipo', 'user'])->get();
        
        return Inertia::render('EquipoUser/Index', [
            'equipoUsers' => $equipoUsers
        ]);
    }

    public function create()
    {
        $equipos = Equipo::all();
        $users = User::all();
        return view('equipo_user.create', compact('equipos', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'user_id' => 'required|exists:users,id',
            'fecha_asignacion' => 'required|date',
        ]);

        EquipoUser::create($validatedData);
        return redirect()->route('dashboard');
    }

    // Aquí puedes agregar métodos para mostrar, editar o eliminar asignaciones
}
