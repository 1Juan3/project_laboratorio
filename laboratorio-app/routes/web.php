<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboratoriosController;
use App\Http\Controllers\EquiposController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/googe-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name("google");

// Ruta para manejar la respuesta de Google y autenticar al usuario
Route::get('/google/callback', function () {
    $user = Socialite::driver('google')->user();

    $userExist = User::where('email', $user->email)->first();

    if ($userExist) {
        Auth::login($userExist);
    } else {
        redirect('/');
    }
    // Redirigir al usuario a la página de inicio después de iniciar sesión
    return redirect('/laboratorios');
});
//ruta para mostrar el login 




//Rutas pra manejar todo lo de sutancia.
// Route::controller(LaboratoriosController::class)->group(function(){
//     Route::get('/laboratorios','verLaboratorios')->name('welcome');
//     Route::get('ver/{nombre_laboratorio}','verReactivos')->name('view');
//     Route::get('laboratorios/ver/{sustancia}','verSustancia')->name('viewReactivo');
//     Route::get('laboratorios/getiamgen/{paht}','verImagen')->name('getImagen');
//     Route::get('laboratorios/getMatriz/{nombre_laboratorio}','verMatriz')->name('getMatriz');
//     Route::get('laboratorios/getPdf/{pdf}','verPdf')->name('getPdf');
//     Route::get('laboratorios/editar/{id}/ver','verEditar')->name('viewEditar');
//     Route::get('laboratorio/eliminar/{id}/{id_sustancia}','verDelete')->name('viewEliminar');
//     Route::post('agregarMatriz', 'addMatriz')->name('postMatriz');
//     Route::post('laboratorios','crearReactivo')->name('postReactivo');
//     Route::post('agregarLaboratorio','addLaboratorio')->name('addLaboratorio');
//     Route::post('laboratorio/eliminar/{id}/{id_sustancia}','deleteSustancia')->name('delete');
//     Route::patch('laboratorios/editar/{id}','updatedSustancia')->name('updated');
//     Route::post('sustancia/editar/{id}/','EditReactivo')->name('editSustancia');
//     Route::get('laboratorios/sustancia/editar/{id}/','ViewEditReactivo')->name('viewEditReactivo');
// });

Route::middleware(['auth'])->group(function () {
    Route::controller(LaboratoriosController::class)->group(function () {
        Route::get('/laboratorios', 'verLaboratorios')->name('welcome');
        Route::get('ver/{nombre_laboratorio}', 'verReactivos')->name('view');
        Route::get('laboratorios/ver/{sustancia}', 'verSustancia')->name('viewReactivo');
        Route::get('laboratorios/getiamgen/{paht}', 'verImagen')->name('getImagen');
        Route::get('laboratorios/getMatriz/{nombre_laboratorio}', 'verMatriz')->name('getMatriz');
        Route::get('laboratorios/getPdf/{pdf}', 'verPdf')->name('getPdf');
        Route::get('laboratorios/editar/{id}/ver', 'verEditar')->name('viewEditar');
        Route::get('laboratorio/eliminar/{id}/{id_sustancia}', 'verDelete')->name('viewEliminar');
        Route::post('agregarMatriz', 'addMatriz')->name('postMatriz');
        Route::post('laboratorios', 'crearReactivo')->name('postReactivo');
        Route::post('agregarLaboratorio', 'addLaboratorio')->name('addLaboratorio');
        Route::post('laboratorio/eliminar/{id}/{id_sustancia}', 'deleteSustancia')->name('delete');
        Route::patch('laboratorios/editar/{id}', 'updatedSustancia')->name('updated');
        Route::post('sustancia/editar/{id}/', 'EditReactivo')->name('editSustancia');
        Route::get('laboratorios/sustancia/editar/{id}/', 'ViewEditReactivo')->name('viewEditReactivo');
    });
});

//Rutas para manejar todo lo de equipos
// Route::controller(EquiposController::class)->group(function(){
//     Route::get('equipos','index')->name('verInventario');
//     Route::get('equipo/getImagenEquipo/{paht}','verImagen')->name('getImagenEquipo');
//     Route::get('equipo/getiFactura/{paht}','verFactura')->name('getFacturaEquipo');
//     Route::get('equipo/getiManual/{paht}','verManual')->name('getManualEquipo');
//     Route::get('equipo/ver/{id}','verEquipo')->name('verEquipo');
//     Route::post('agregarEquipo','crearEquipo')->name('postEquipo');
//     Route::post('agregar/informacion/hoja-de-vida/{id}','agregarInformacionHv')->name('agregarInformacionHv');
//     Route::get('equipo/Hv/{id}','verHojaV')->name('verHv');
//     Route::post('update/equipo/{id}','updateEquipo')->name('updatedEquipo');
//     Route::get('editar/equipo/{id}','indexEditarEquipo')->name('viewUpdated');
//     Route::get('logout','logout')->name('viewUpdated')->name('logout');;
// });

Route::controller(EquiposController::class)->group(function () {
    Route::get('equipos', 'index')->middleware('auth')->name('verInventario');
    Route::get('equipo/getImagenEquipo/{paht}', 'verImagen')->middleware('auth')->name('getImagenEquipo');
    Route::get('equipo/getiFactura/{paht}', 'verFactura')->middleware('auth')->name('getFacturaEquipo');
    Route::get('equipo/getiManual/{paht}', 'verManual')->middleware('auth')->name('getManualEquipo');
    Route::get('equipo/ver/{id}', 'verEquipo')->middleware('auth')->name('verEquipo');
    Route::post('agregarEquipo', 'crearEquipo')->middleware('auth')->name('postEquipo');
    Route::post('agregar/informacion/hoja-de-vida/{id}', 'agregarInformacionHv')->middleware('auth')->name('agregarInformacionHv');
    Route::get('equipo/Hv/{id}', 'verHojaV')->middleware('auth')->name('verHv');
    Route::post('update/equipo/{id}', 'updateEquipo')->middleware('auth')->name('updatedEquipo');
    Route::get('editar/equipo/{id}', 'indexEditarEquipo')->middleware('auth')->name('viewUpdated');
    Route::get('logout', 'logout')->name('logout');
});
