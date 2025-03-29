<?php

namespace App\Http\Controllers;

use App\Models\Recetas;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class RecetasController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {
        $paciente = Pacientes::find($id);
        return view('recetas.create',compact("paciente","id"));

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Recetas $recetas, $id)
    {
        $paciente = Pacientes::find($id);
        $recetas = Recetas::where('id_paciente',$id)->get();
        return view('recetas.index', compact("paciente","id","recetas"));
    }

    public function edit(Recetas $recetas)
    {
        //
    }

    public function update(Request $request, Recetas $recetas)
    {
        //
    }

    public function destroy(Recetas $recetas)
    {
        //
    }
}
