<?php

namespace App\Http\Controllers;

use App\Models\EquipoUser;
use Illuminate\Http\Request;
use Inertia\Inertia;


class EquipoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipoUsers = EquipoUser::join('equipos', 'equipo_user.equipo_id', '=', 'equipos.id')
            ->join('users', 'equipo_user.user_id', '=', 'users.id')
            ->join('division_user', 'users.id', '=', 'division_user.user_id')
            ->join('departamentos', 'division_user.departamento_id', '=', 'departamentos.id')
            ->join('subdepartamentos', 'departamentos.id', '=', 'subdepartamentos.departamento_id')
            ->join('unidades', 'subdepartamentos.id', '=', 'unidades.subdepartamento_id')
            ->join('ubicaciones', 'equipo_user.ubicacion_id', '=', 'ubicaciones.id')
            ->join('marcas_modelos', 'equipos.marcas_modelos_id', '=', 'marcas_modelos.id')
            ->select('equipo_user.*', 'equipos.n_serie', 'equipos.n_inventario', 'users.name', 'ubicaciones.direccion', 'ubicaciones.piso',
             'ubicaciones.oficina', 'departamentos.nombre as departamento', 'subdepartamentos.nombre as subdepartamento', 'unidades.nombre as unidad',
              'marcas_modelos.nombre_marca', 'marcas_modelos.nombre_modelo')
            ->get();
        return Inertia::render('EquipoUser/Index', [
            'equipoUsers' => $equipoUsers
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipoUser $equipoUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipoUser $equipoUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoUser $equipoUser)
    {
        //
    }
}
