<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableroController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de tableros protegidas por autenticación
    // Ruta para ver los tableros del usuario
    Route::get('/tableros', [TableroController::class, 'index'])->name('tableros.index');

    // Ruta para mostrar el formulario de creación de un tablero
    Route::get('/tableros/create', [TableroController::class, 'create'])->name('tableros.create');

    // Ruta para guardar el tablero en la base de datos
    Route::post('/tableros', [TableroController::class, 'store'])->name('tableros.store');

    // Ruta para mostrar el formulario de creación de un tablero
    Route::get('/contenido/create', [ContenidoController::class, 'create'])->name('contenidos.create');
    
    // Ruta para guardar los contenidos en la base de datos
    Route::post('/contenidos', [ContenidoController::class, 'store'])->name('contenidos.store');

    // Ruta para mostrar un contenido específico
    Route::get('/tableros/{tablero}', [TableroController::class, 'show'])->name('tableros.show');



    Route::get('tableros/{id}/edit', [TableroController::class, 'edit'])->name('tableros.edit');
    Route::put('tableros/{id}', [TableroController::class, 'update'])->name('tableros.update');

    Route::delete('tableros/{id}', [TableroController::class, 'destroy'])->name('tableros.destroy');





    Route::get('contenidos/{id}/add-subcontent', [ContenidoController::class, 'addSubcontent'])->name('contenidos.addSubcontent');
    Route::post('contenidos/{id}/store-subcontent', [ContenidoController::class, 'storeSubcontent'])->name('contenidos.storeSubcontent');

    // Ruta para ver el chat
    Route::get('/chat', [GrupoController::class, 'index'])->name('social.index');
    // Ruta para guardar los grupos en la base de datos
    Route::post('/chat', [GrupoController::class, 'crearGrupo'])->name('chat.create');

});







require __DIR__.'/auth.php';




//Route::get('/tableros', [TableroController::class, 'index'])->name('tableros.index');
//Route::get('/tableros/create', [TableroController::class, 'create'])->name('tableros.create');
