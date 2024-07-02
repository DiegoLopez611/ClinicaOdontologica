<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacion'=>'required|string',
            'nombres'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'correoElectronico'=>'required|email',

            
        ]);

        Medico::create($request->all());

        return redirect('medicos');
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
        $medico = Medico::where('identificacion', $identificacion)->firstOrFail();
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $identificacion)
    {
        $request->validate([
            'identificacion'=>'required|string',
            'nombres'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'correoElectronico'=>'required|email',

            
        ]);
        $medico = Medico::where('identificacion', $identificacion)->firstOrFail();
        $medico->update($request->all());

        return redirect('medicos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identificacion)
    {
        $medico = Medico::where('identificacion', $identificacion)->firstOrFail();
        $medico->delete();
        return redirect('medicos');
    }
}
