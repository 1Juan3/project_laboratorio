<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\HojaVida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquiposController extends Controller
{
    //Esta funcion es para listar los equipos en la tabla 
    public function index()
    {
        $equipos = Equipos::all();
        if (!$equipos) {
            abort(404); // Maneja el caso de que no se encuentre nada
        }
        return view('equipos.equipos', ['equipos' => $equipos]);
    }
    // con esta funcion creo los equipos 
    public function crearEquipo(Request $request)
    {
        $nombre = $request->input('nombre');
        $imagen = $request->file('imagen');
        $factura = $request->file('factura');
        $manual = $request->file('manual');
        if ($imagen && $factura && $manual) {
            $ruta_imagen_equipo = $imagen->storeAs('', $nombre . '.webp', 'disco_imagenes_equipo');
            $ruta_factura_equipo = $factura->storeAs('', $nombre . '.webp', 'disco_facturas_equipo');
            $ruta_manual_equipo = $manual->storeAs('', $nombre . '.pdf', 'disco_manuales_equipo');

            $equipo = new Equipos;
            $equipo->equipo = $nombre;
            $equipo->unidades = $request->input('unidades');
            $equipo->valor_compra = $request->input('valor_compra');
            $equipo->ubicacion = $request->input('ubicacion');
            $equipo->frec_mantenimiento = $request->input('frec_mantenimiento');
            $equipo->pro_academico = $request->input('pro_academico');
            $equipo->documento_soporte = $request->input('documento_soporte');
            $equipo->usos = $request->input('usos');
            $equipo->observaciones = $request->input('observaciones');
            $equipo->fichas_fisico = $request->input('ficha');
            $equipo->imagen = $nombre . '.webp';
            $equipo->factura = $nombre . '.webp';
            $equipo->manual_usuario = $nombre . '.pdf';
            $equipo->save();
            $hv = new HojaVida();
            $hv->nombre_equipo = $nombre;
            $hv->save();

            session()->flash('status', 'Equipo guardado exitosamente');
        } else {
            session()->flash('status1', 'No se pudo crear el equipo comunicate con sopoporte del aplicativo');
        }

        return redirect()->route('verInventario');
    }
    // en esta funcion se muestra los equiopos uno por uno 
    public function verEquipo($id)
    {
        $equipo = Equipos::where('id', $id)->get();
        if (!$equipo) {
            abort(404); // Maneja el caso de que no se encuentre equipo
        }
        return view('equipos.equipo', ['equipo' => $equipo]);
    }
    // en estas funciones  creo la vista de los archivos estaticos
    public function verImagen($path)
    {
        //cambiar a disco E cuando este en el servidor.
        $rutaImagen = 'E:\imagenes_equipos\\' . $path;
        return response()->file($rutaImagen);
    }

    public function verFactura($path)
    {
        //cambiar a disco E cuando este en el servidor.
        $rutaImagen = 'E:\facturas_equipos\\' . $path;
        return response()->file($rutaImagen);
    }

    public function verManual($path)
    {
        //cambiar a disco E cuando este en el servidor.
        $rutaImagen = 'E:\manuales_equipos\\' . $path;
        return response()->file($rutaImagen);
    }
    //esta funcion es la que maneja la vista para ver la hoja de vida del equipo 
    public function verHojaV($id)
    {
        $hv = HojaVida::where('id', $id)->first();

        if (!$hv) {
            abort(404); // Maneja el caso de que no se encuentre la hoja de vida
        }

        return view('equipos.hojavida', ['hv' => $hv, 'id' => $id]);
    }
    //con esta funcion se agrega informacion a la hoja de vida 
    public function agregarInformacionHv(Request $request, $id)
    {
        $hojaDeVida = HojaVida::find($id);

        if (!$hojaDeVida) {
            abort(404); // Maneja el caso de que no se encuentre la hoja de vida
        }

        $hojaDeVida->update($request->all());

        // Opcionalmente, puedes redirigir a otra página después de actualizar los datos
        return redirect()->route('verHv', $id)->with('status', 'La informacion se ha guardado exitosamente ');
    }

    //con esta funcion edito el equipo en la data table 
    public function indexEditarEquipo(Request $request, $id)
    {
        $equipo = Equipos::find($id);

        if (!$equipo) {
            abort(404); // Maneja el caso de que no se encuentre equipo
        }
        return view('equipos.editar', ['equipo' => $equipo], ['id' => $id]);
    }
    public function updateEquipo(Request $request, $id)
    {
        $equipo = Equipos::find($id);
        if (!$equipo) {
            abort(404); // Maneja el caso de que no se encuentre equipo
        }
        $equipo->update($request->all());
        return redirect()->route('verInventario', $id)->with('status', 'La se actualizo el equipo exitosamente ');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
