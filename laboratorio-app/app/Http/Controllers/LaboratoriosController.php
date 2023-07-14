<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Request es lo que permite traer la informacion de los formularios 
//importacion de los modelos que se conectan con los datops en la base de datos 
use App\Models\Editar;
use App\Models\Eliminar;
use App\Models\Laboratorios;
use App\Models\Laboratorio1Reactivos;
use App\Models\Laboratorio_1;
use App\Models\Matriz;




class LaboratoriosController extends Controller
{   //en esta funcion es para listar los laboratorios en el index 
    public function verLaboratorios(){
        $informacion = Laboratorios::all();
        return view('welcome', ['informacion'=>$informacion]);
    }
    //En etsa funcion creo el recativo y hago validaciones para que no se repita el codigo del reactivo. guardo la imagen en el disco 
    //D o E dependiendo donde este trabajando si en Local o en el servidor 
    //Para editar las rutas donde se guardan los archivos hay que editar config/filesystems y agrega el en donde desea guardar los estaticos 
    public function crearReactivo(Request $request){
        $nombre_laboratorio = $request->input('laboratorio');
        $imagen = $request->file('imagen');
        $pdf = $request->file('ficha_seguridad');
        if($imagen ){
        $nombre =  $request->input('nombre');

        $ruta_imagen = $imagen->storeAs('', $nombre.'.webp', 'disco_imagenes');
        if ($pdf) {
            $ruta_ficha = $pdf->storeAs('', $nombre.'.pdf', 'disco_fichas_seguridad');
        } else {
            // Manejar el caso en el que no se proporciona un archivo PDF
            $ruta_ficha = null; // O cualquier valor predeterminado que desees asignar
        }
        $codigo = $request->input('codigo');
        $codigo1 = Laboratorio_1::where('id', $codigo)->value('id');
        if($codigo == $codigo1){
            return  redirect()->route('view',$nombre_laboratorio)->with('status1', 'No se puede crear una sustancia con el mismo codigo');
        }else{
            $reactivo = new Laboratorio_1;
            $reactivo->id = $codigo;
            $reactivo->nombre_laboratorio=  $request->input('laboratorio');
            $reactivo->nombre_sustancia =  $request->input('nombre');
            $reactivo->fecha_inventario =  $request->input('fecha_inventario');
            $reactivo->numero_gabeta =  $request->input('nombre_gabeta');
            $reactivo->nombre_fabricante =  $request->input('nombre_fabricante');
            $reactivo->proveedor_compra =  $request->input('proveedor');
            $reactivo->utiliza_sustancia =  $request->input('utiliza');
            $reactivo->fecha_vencimiento =  $request->input('date_venc');
            $reactivo->observaciones =  $request->input('observacion');
            $reactivo->posee_etiqueta =  $request->input('etiqueta');
            $reactivo->se_trasvasa =  $request->input('trasvasa');
            $reactivo->cant_inventariada =  $request->input('cant_inv');
            $reactivo->frecuencia_uso =  $request->input('fre_uso');
            $reactivo->estado_sustancia = $request->input('estado');
            $reactivo->unidad_medida =  $request->input('u_med');
            $reactivo->cantidad_neto =  $request->input('cantidad');
            $reactivo->save();
            $cantidad = $request->input('cant_inv');
            
    for ($i = 0; $i < $cantidad; $i++) { 
        $sustancia = new Laboratorio1Reactivos;
        $sustancia->imagen_reactivo = $nombre .'.webp';
        $sustancia->nombre_reactivo = $request->input('nombre');
        $sustancia->cant_reactivo = $request->input('cantidad');
        $sustancia->ficha_seguridad = $nombre .'.pdf';
        $sustancia->codigo_laboratorio1 =  $request->input('codigo'); // Asignar el valor de la clave foránea
        $sustancia->save();
            }
        }

        session()->flash('status', 'Reactivo generado');
        
    }else{
        
        session()->flash('status1', 'No se puedo generar el reactivo ');
    }


    return redirect()->route('view',$nombre_laboratorio);
    }

     

//Esta funcion la utilizo para listar los reactivos en la datatable 
    public function verReactivos($nombre_laboratorio){
        $laboratorios = Laboratorios::all();
        $informacion= Laboratorio_1::where('nombre_laboratorio', $nombre_laboratorio)->get();
        

        return view('sustancias.laboratorio1', [
            'informacion' => $informacion,
            'laboratorios' => $laboratorios,
            'nombre_laboratorio' => $nombre_laboratorio
        ]);
        
    }
// esta funcion es para listar la infoormacion del recativo solo 
    public function verSustancia($sustancia){

        $informacion = Laboratorio1Reactivos::select('laboratorio_1.fecha_vencimiento','laboratorio_1.unidad_medida', 'laboratorio_1.observaciones', 'recativos_laboratorio1.*')
        ->join('laboratorio_1', 'laboratorio_1.id', '=', 'recativos_laboratorio1.codigo_laboratorio1')
        ->where('recativos_laboratorio1.codigo_laboratorio1', '=', $sustancia)
        ->get();


        return view('sustancias.sustancia', ['informacion'=>$informacion , 'sustancia ' =>$sustancia]);

    }

    //  esta funcion es para poder que la imagen sirva
    public function verImagen($path) {
        //cambiar a disco E cuando este en produccion .
        $rutaImagen = 'E:\images_reactivos_laboratorio\\' . $path;
        return response()->file($rutaImagen);
    }
    //Esta funcion es para lo mismo de la imagen para poder visualizar el pdf 
    public function verPdf($pdf) {
        //cambiar a disco E cuando este en produccion .
        $rutaPdf = 'E:\pdf_fichas_seguridad_laboratorio\\' . $pdf;
        if (!$rutaPdf) {
            abort(404); // Maneja el caso de que no se encuentre
        }

        
        return response()->file($rutaPdf);
    }
    //aca para poder visualizar la matriz 
    public function verMatriz($pdf) {

        $matriz = Matriz::where('nombre_laboratorio', $pdf)->value('matriz');
        if (!$matriz) {
            abort(404); // Maneja el caso de que no se encuentre 
        }
        //cambiar a disco E cuando este en produccion .
        $rutaPdf = 'E:\pdf_matriz_compatibilidad\\' . $matriz;
        
        return response()->file($rutaPdf);
    }
    //En esta funcion es donde actualizo el reactivo cuando se muestra individual
     public function updatedSustancia(Request $request ,$id){
        $request->validate([
            'name_user' => ['required'],
            'documento' => ['required'],
            'cantidad' => ['required'],
            'comentario' => ['required']
        ]);
        $cantidad = $request ->input('cantidad');
        $editar =  new Editar;
        $editar -> nombre_utilizo = $request->input('name_user');
        $editar -> documento = $request->input('documento');
        $editar->comentario = $request->input('comentario');
        $editar -> id_reactivo =$id;
        $editar-> save();
        Laboratorio1Reactivos::where('codigo_laboratorio1', $id)
            ->update(['cant_reactivo' => $cantidad]);
            return redirect()->route('view')->with('status', 'Cantidad actualizada para la sustancia  ' );
     }
//Esta funcion es la quepermite que la vista editar funcione o se muestre 
     public function verEditar($id){
        $cantidad = Laboratorio1Reactivos::where('codigo_laboratorio1', $id)->first();
        
        return view('sustancias.editar', ['cantidad' => $cantidad]);
     }
// en esta funcio agrego los laboratorios en la vista index o en la vista welcome 
     public function addLaboratorio( Request $request){
        $imagen = $request->file('imagen');
        $nombre = $request->input('nombre_laboratorio');

        if ($imagen) {
            $ruta_imagen = $imagen->storeAs('', $nombre.'.webp');
        } else {
            // Manejar el caso en el que no se proporciona un archivo PDF
            $ruta_imagen = null; // O cualquier valor predeterminado que desees asignar
        }
        
        $laboratorio = New Laboratorios;
        $laboratorio ->nombre_laboratorio =  $nombre;
        $laboratorio->imagen=$nombre .'.webp';
        $laboratorio ->save();
       return redirect('/')->with('status', '¡¡El laboratorio se creo exitosamente!! ');
     }
     public function verDelete($id, $id_sustancia){
        return view('sustancias.eliminar',['id'=>$id, 'id_sustancia'=>$id_sustancia] );
     }
 // esta funcion e s para eliminar la sustancia, se elimina la sustancia individual pero queda en la tabla principal 
     public function deleteSustancia(Request $request, $id, $id_sustancia){

        $eliminar = New Eliminar();
        $eliminar -> nombre_elimino = $request->input('name_user');
        $eliminar -> cedula = $request->input('documento');
        $eliminar->comentario = $request->input('comentario');
        $eliminar -> id_reactivo =$id;
        $eliminar->save(); 
        $cantidad_productos = Laboratorio_1::where('codigo_producto', $id)->value('cant_inventariada');
        $cantidad_productos-=1;
        Laboratorio1Reactivos::where('id', $id_sustancia)
                    ->delete();
        Laboratorio_1::where('codigo_producto', $id)
                ->update(['cant_inventariada'=>$cantidad_productos]);
           return redirect('/laboratorio1/ver')->with('status', 'Sustancia eliminada correctamente ');
     }
     // esta funcion es para agregar la matriz de cada laboratorio 
     public function addMatriz(Request $request){
        $pdf = $request->file('matriz');
        $matriz = new Matriz;
        $matriz->nombre_laboratorio=  $request->input('nombre_laboratorio');
        $nombrePdf = $pdf->getClientOriginalName();
        $rutaMatriz= $pdf->storeAs('', $nombrePdf.'', 'disco_matriz_compatibilidad');
        $matriz->matriz= $nombrePdf;
        $matriz->save();
        
        return redirect()->route('welcome');
     }
// esta funcion es para que s emuestre la vista editar el reactivo en la tabla 
     public function ViewEditReactivo(Request $request, $id){
        $laboratorios = Laboratorios::all();
        $reactivo = Laboratorio_1::find($id);
        $cant_consulta = Laboratorio_1::where('id', $id)->value('cant_inventariada');

        return view('sustancias.edit', ['laboratorios'=>$laboratorios], ['reactivo'=>$reactivo]);
     }
     //esta funcion es la edita el reactivo 
     public function EditReactivo(Request $request, $id){
        $reactivo = Laboratorio_1::find($id);
        $nombre = $request->nombre_sustancia;
        $cantidad = $request->cant_inventariada;
        $cantidadNeto = $request->cantidad_neto;
        if (!$reactivo) {
            abort(404); // Maneja el caso de que no se encuentre el reactivo
        }
        $reactivo->update($request->all());
        $cant_consulta = Laboratorio1Reactivos::where('nombre_reactivo', $nombre)->count();

        if ($cantidad > $cant_consulta) {
            // Agregar nuevos reactivos con la misma información
            $cantidad_nueva = $cantidad - $cant_consulta;
        
            for ($i = 0; $i < $cantidad_nueva; $i++) {
                $nuevo_reactivo = new Laboratorio1Reactivos;
                $nuevo_reactivo->imagen_reactivo = $nombre . '.webp';
                $nuevo_reactivo->nombre_reactivo = $nombre;
                $nuevo_reactivo->cant_reactivo = $cantidadNeto;
                $nuevo_reactivo->ficha_seguridad = $nombre . '.pdf';
                $nuevo_reactivo->codigo_laboratorio1 = $id;
                $nuevo_reactivo->save();
            }
        } else {
            // Eliminar los últimos reactivos hasta alcanzar la cantidad deseada
            $cantidad_eliminar = $cant_consulta - $cantidad;
        
            $reactivos_a_eliminar = Laboratorio1Reactivos::where('nombre_reactivo', $nombre)
                ->orderBy('id', 'desc')
                ->take($cantidad_eliminar)
                ->get();
        
            foreach ($reactivos_a_eliminar as $reactivo_eliminar) {
                $reactivo_eliminar->delete();
            }
        }
                
        return redirect()->route('view', $reactivo->nombre_laboratorio)->with('status', 'Se actualizó el equipo exitosamente');
    }
    
    
}


