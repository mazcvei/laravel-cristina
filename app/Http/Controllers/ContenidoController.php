<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Url;
use App\Models\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ContenidoController extends Controller
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
        // Obtener todos los tableros del usuario autenticado 
        $tableros = auth()->user()->tableros;
        return view('contenidos.create', compact('tableros'));

        
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tablero_id' => 'required|exists:tableros,id',
            'titulo_contenido' => 'required|string|max:255',
            'url' => 'required|url',
            'descripcion_url' => 'required|string',
            'imagen_url' => 'required|image|mimes:jpg,jpeg,png,gif', // Validación de imagen
        ]);
    
        // Guardar la imagen
        if ($request->hasFile('imagen_url')) {
            $imagePath = $request->file('imagen_url')->store('public/images'); // Guardarlo en el directorio 'storage/app/public/images'
            $imageUrl = Storage::url($imagePath); // Obtener la URL pública de la imagen
        }
    
        // Crear contenido
        $contenido = Contenido::create([
            'tablero_id' => $request->tablero_id,
            'titulo_contenido' => $request->titulo_contenido,
        ]);
    
        // Crear URL
        Url::create([
            'contenido_id' => $contenido->id,
            'url' => $request->url,
            'descripcion_url' => $request->descripcion_url,
            'imagen_url' => $imageUrl, // Guardar la URL de la imagen
        ]);
    
        // Redirigir o retornar una respuesta
        return redirect()->route('tableros.show', $contenido->tablero_id);
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




    public function addSubcontent($id)
    {
        $contenido = Contenido::findOrFail($id);
        $tablero = $contenido->tablero; // Relación con el tablero asociado
        return view('contenidos.addSubcontent', compact('contenido', 'tablero'));
    }








    public function storeSubcontent(Request $request, $id)
{
    $request->validate([
        'url' => 'required|url',
        'descripcion_url' => 'nullable|string|max:255',
        'imagen_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $contenidoBase = Contenido::findOrFail($id);

    // Crear un nuevo registro de URL asociado al contenido base
    $url = new Url();
    $url->contenido_id = $contenidoBase->id;
    $url->url = $request->url;
    $url->descripcion_url = $request->descripcion_url;

    // Guardar imagen si se carga
    if ($request->hasFile('imagen_url')) {
        $path = $request->file('imagen_url')->store('imagenes', 'public');
        $url->foto_url = $path;
    }

    $url->save();

    return redirect()->route('contenidos.index')->with('success', 'Subcontenido agregado correctamente.');
}










}
