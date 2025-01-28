<?php

namespace App\Http\Controllers;
use App\Models\Tablero;

use Illuminate\Http\Request;

class TableroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        //
        //$tableros = Tablero::all(); Con esta instrucción muestra toda la tabla
        // Obtener solo los tableros del usuario autenticado
        $tableros = Tablero::where('user_id', auth()->id())->get();
        return view('tableros.index', compact('tableros'));
    }*/

    public function index()
    {
        // Obtener solo los tableros del usuario autenticado y ordenarlos alfabéticamente
        $tableros = Tablero::where('user_id', auth()->id())
                        ->orderBy('nombre_tablero', 'asc') // Ordenar alfabéticamente (ascendente)
                        ->get();
        
        return view('tableros.index', compact('tableros'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("tableros.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validar los datos del formulario
        $request->validate([
            'nombre_tablero' => 'required|string|max:255',
        ]);
        // Crear un nuevo tablero
        $tablero= new Tablero;
        $tablero->nombre_tablero=$request->nombre_tablero;

        // Asociar el tablero al usuario autenticado
        $tablero->user_id = auth()->id(); 
        $tablero->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('tableros.index')->with('success', 'Tablero creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtén el tablero específico con su contenido
       // $tablero = Tablero::with('contenidos')->findOrFail($id);

        // Obtén el tablero específico con su contenido y las URLs de los contenidos
        $tablero = Tablero::with(['contenidos.urls'])->findOrFail($id);

        // Retorna la vista con los datos del tablero
        return view('tableros.show', compact('tablero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tablero = Tablero::findOrFail($id);
        return view('tableros.edit', compact('tablero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validar los datos
        $request->validate([
            'nombre_tablero' => 'required|string|max:255',
        ]);

        // Encontrar el tablero y actualizarlo
        $tablero = Tablero::findOrFail($id);
        $tablero->nombre_tablero = $request->nombre_tablero;
        $tablero->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('tableros.index')->with('success', 'Tablero actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontrar el tablero y eliminarlo
        $tablero = Tablero::findOrFail($id);
        $tablero->delete();
        // Redirigir con un mensaje de éxito
        return redirect()->route('tableros.index')->with('success', 'Tablero eliminado exitosamente.');
        
    }
}
