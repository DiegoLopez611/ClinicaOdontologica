<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacion'=>'required|string',
            'edad'=>'required|integer|min:1',
            'nombres'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'correoElectronico'=>'required|email',

            
        ]);

        Paciente::create($request->all());

        return redirect('pacientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $identificacion)
    {
        $paciente = Paciente::where('identificacion', $identificacion)->firstOrFail();
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $identificacion)
    {
        $request->validate([
            'identificacion'=>'required|string',
            'edad'=>'required|integer|min:1',
            'nombres'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'correoElectronico'=>'required|email',

            
        ]);
        $paciente = Paciente::where('identificacion', $identificacion)->firstOrFail();
        $paciente->update($request->all());

        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identificacion)
    {
        $paciente = Paciente::where('identificacion', $identificacion)->firstOrFail();
        $paciente->delete();
        return redirect('pacientes');
    }
}
