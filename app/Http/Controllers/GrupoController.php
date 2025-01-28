<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\UsuariosGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los grupos a los que el usuario está asociado
        $grupos = Grupo::whereHas('usuariosGrupos', function ($query) {
            $query->where('user_id', auth()->id()); // Filtra los grupos donde el usuario está
        })->get();

        // Devolver la vista con los grupos asociados al usuario
        return view('social.index', compact('grupos')); // Pasa los grupos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Funcion para crear un grupo.
     */

    public function crearGrupo(Request $request)
    {
        // Validar los datos del formulario del modal
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto_grupo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validación de imagen con límite de tamaño
        ]);
     
        // Inicializar la variable para la URL de la imagen
        $imageUrl = null;
     
        // Guardar la imagen si está presente
        if ($request->hasFile('foto_grupo')) {
            $imagePath = $request->file('foto_grupo')->store('public/images'); // Guardarlo en el directorio 'storage/app/public/images'
            $imageUrl = Storage::url($imagePath); // Obtener la URL pública de la imagen
        }
     
        // Crear el grupo en la base de datos
        $grupo = Grupo::create([
            'nombre' => $request->nombre,
            'foto_grupo' => $imageUrl, // Guardar la URL de la imagen en la base de datos
            'creador_id' => auth()->id(), // Usar el ID del usuario autenticado
        ]);

        // Asociar al usuario autenticado al grupo recién creado
        UsuariosGrupo::create([
            'grupo_id' => $grupo->id, // ID del grupo recién creado
            'user_id' => auth()->id(), // ID del usuario autenticado (creador)
        ]);
     
        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('social.index')->with('success', 'Grupo creado con éxito.');
    }
     










}
