<x-layout titulo="hoja de vida ">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/hojavida.css') }}">
    </x-slot>
    <section class="encabezado">
        <!-- Button  modal crear equipo -->
   

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content container-fluid">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar la informacion a la HV</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">

                        <form action="{{ route('agregarInformacionHv', ['id' => $id]) }}" method="POST" enctype="multipart/form-data" class="row">
                            @csrf

                            <div class="form-floating mb-3 col-6 ps-1" >
                                <input type="text" class="form-control" id="floatingInput1" name="nombre_equipo" value="{{old('nombre_equipo', $hv->nombre_equipo)}}"
                                    placeholder="Nombre del equipo ">
                                <label for="floatingInput ">Nombre del equipo</label>
                            </div>
                            <div class="form-floating mb-3  col-6 ps-1  ">
                                <input type="text" class="form-control" id="floatingInput1" name="marca_fabricante" value="{{old('marca_fabricante', $hv->marca_fabricante)}}"
                                    placeholder="Marca del Fabricante ">
                                <label for="floatingInput">Marca del Fabricante</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1 ">
                                <input type="text" class="form-control" id="floatingInput1" name="referencia" value="{{old('referencia', $hv->referencia)}}"
                                    placeholder="Referencia ">
                                <label for="floatingInput">Referencia</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="modelo" value="{{old('modelo', $hv->modelo)}}"
                                    placeholder="Modelo ">
                                <label for="floatingInput">Modelo</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="numero_serie" value="{{old('modelo', $hv->numero_serie)}}"
                                    placeholder="Numero de serie">
                                <label for="floatingInput">Numero de serie</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="numero_codificacion" value="{{old('modelo', $hv->numero_codificacion)}}"
                                    placeholder="Numero de codificacion interna">
                                <label for="floatingInput">Numero de codificacion interna</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="date" class="form-control" id="floatingInput1" name="fecha_inicio_servicio" value="{{old('modelo', $hv->fecha_inicio_servicio)}}"
                                    placeholder="Fecha inicio en servicio ">
                                <label for="floatingInput">Fecha inicio en servicio</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="condiciones_utilizacion" value="{{old('modelo', $hv->condiciones_utilizacion)}}"
                                    placeholder="Condiciones de utilizacion">
                                <label for="floatingInput">Condiciones de utilizacion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="valor_equipo" value="{{old('modelo', $hv->valor_equipo)}}"
                                    placeholder="Valor del equipo y Factura de compra">
                                <label for="floatingInput">Valor del equipo y Factura de compra</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="pais_fabricacion" value="{{old('modelo', $hv->pais_fabricacion)}}"
                                    placeholder="Pais de fabricacion ">
                                <label for="floatingInput">Pais de fabricacion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" name="descripcion" value="{{old('modelo', $hv->descripcion)}}"
                                    placeholder="Descripcion ">
                                <label for="floatingInput">Descripcion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->grupos_calibracion)}}"
                                    name="grupos_calibracion" placeholder="Grupos de calibracion">
                                <label for="floatingInput">Grupos de calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->intervalo_calibracion)}}"
                                    name="intervalo_calibracion" placeholder="Intervalo de calibracion">
                                <label for="floatingInput">Intervalo de calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="date" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->fecha_calibracion)}}"
                                    name="fecha_calibracion" placeholder="Fecha de calibracion">
                                <label for="floatingInput">Fecha de calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1"  value="{{old('modelo', $hv->modelo)}}"
                                    name="modelo" placeholder="Marca del Fabricante">
                                <label for="floatingInput">Marca del Fabricante</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1"  value="{{old('modelo', $hv->procedimiento_calibracion)}}"
                                    name="procedimiento_calibracion" placeholder="Procedimiento de calibracion">
                                <label for="floatingInput">Procedimeento de calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->resultado_calibracion)}}"
                                    name="resultado_calibracion" placeholder="Resultado de la calibracion">
                                <label for="floatingInput">Resultado de la calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->naturaleza_calibracion)}}"
                                    name="naturaleza_calibracion" placeholder="Naturaleza de calibracion ">
                                <label for="floatingInput">Naturaleza de calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->localizacion)}}"
                                    name="localizacion" placeholder="Localizacion ">
                                <label for="floatingInput">Localizacion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->limites_empleo)}}"
                                    name="limites_empleo" placeholder="Limites de empleo ">
                                <label for="floatingInput">Limites de empleo</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1"  value="{{old('modelo', $hv->condiciones_uso_almacenamiento)}}"
                                    name="condiciones_uso_almacenamiento" placeholder="Condiciones de uso y almacenamiento ">
                                <label for="floatingInput">Condiciones de uso y almacenamiento</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->observaciones)}}"
                                    name="observaciones" placeholder="Observaciones ">
                                <label for="floatingInput">Observaciones</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->nombre_equipo)}}"
                                    name="nombre_equipo" placeholder="Nombre del equipo ">
                                <label for="floatingInput">Nombre del equipo</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->numero_inventario)}}"
                                    name="numero_inventario" placeholder="Numero de inventario ">
                                <label for="floatingInput">Numero de inventario</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="date" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->fecha_ultima_calibracion)}}"
                                    name="fecha_ultima_calibracion" placeholder="Fecha ultima calibracion ">
                                <label for="floatingInput">Fecha ultima calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="date" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->fecha_proxima_calibracion)}}"
                                    name="fecha_proxima_calibracion" placeholder="Fecha proxima calibracion ">
                                <label for="floatingInput">Fecha proxima calibracion</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->limitaciones_uso)}}"
                                    name="limitaciones_uso" placeholder="Limitaciones de uso ">
                                <label for="floatingInput">Limitaciones de uso</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="date" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->fecha_mantenimiento)}}"
                                    name="fecha_mantenimiento" placeholder="Fecha matenimiento">
                                <label for="floatingInput">Fecha mantenimiento</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->actividad_realizada)}}"
                                    name="actividad_realizada" placeholder="Actividad realizada ">
                                <label for="floatingInput">Actividad realizada</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->quien_realizo_mantenimiento)}}"
                                    name="quien_realizo_mantenimiento" placeholder="Quien realizo el mantenimiento">
                                <label for="floatingInput">Quien realizo el mantenimiento</label>
                            </div>
                            <div class="form-floating mb-3 col-6 ps-1">
                                <input type="text" class="form-control" id="floatingInput1" value="{{old('modelo', $hv->observaciones_calibracion)}}"
                                    name="observaciones_calibracion" placeholder="Quien realizo el mantenimiento">
                                <label for="floatingInput">Observaciones de la calibracion</label>
                            </div>
                         





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar informacion</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="boton mt-3 mx-auto " style="width: 30%">
        <button type="button" class="btn btn-success mt-5 " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar informacion a la hoja de vida
        </button>
    </div>
    <h1>LABORATORIO FACULTAD DE INGENIERÍA</h1>


    <section class="tabla container-fluid ">
        <div class="bd-example row col-12 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto ">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col" colspan="2" style="text-align: center;">Hoja de vida equipo {{$hv->nombre_equipo}}</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2" style="text-align: center;">DATOS FIJOS</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($hv as $hojavida) --}}
                    <tr>
                        <th colspan="1" class="col-4">Nombre del equipo</th>
                        <td colspan="1" class="col-8 ">{{$hv->nombre_equipo}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Marca del fabricante</th>
                        <td colspan="1" class="col-8">{{$hv->marca_fabricante}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Referencia</th>
                        <td colspan="1" class="col-8">{{$hv->referencia}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Modelo</th>
                        <td colspan="1" class="col-8">{{$hv->modelo}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Numero de serie</th>
                        <td colspan="1" class="col-8">{{$hv->numero_serie}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Número de codificación interna</th>
                        <td colspan="1" class="col-8">{{$hv->numero_codificacion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Fecha de inicio de servicio</th>
                        <td colspan="1" class="col-8">{{$hv->fecha_inicio_servicio}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Condiciones de utilización</th>
                        <td colspan="1" class="col-8">{{$hv->condiciones_utilizacion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Valor del equipo y factura de compra</th>
                        <td colspan="1" class="col-8">{{$hv->valor_equipo}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Pais de fabricación</th>
                        <td colspan="1" class="col-8">{{$hv->pais_fabricacion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Descripcion</th>
                        <td colspan="1" class="col-8">{{$hv->descripcion}}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="col-4" style="text-align: center;">DATOS VARIABLES</th>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Grupos de calibración</th>
                        <td colspan="1" class="col-8">{{$hv->grupos_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Intervalo de calibración</th>
                        <td colspan="1" class="col-8">{{$hv->intervalo_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Fecha de calibración</th>
                        <td colspan="1" class="col-8">{{$hv->fecha_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Procedimiento de calibración</th>
                        <td colspan="1" class="col-8">{{ $hv->procedimiento_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Resultado de calibración</th>
                        <td colspan="1" class="col-8">{{$hv->resultado_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Localización</th>
                        <td colspan="1" class="col-8">{{$hv->localizacion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Naturaleza de calibración</th>
                        <td colspan="1" class="col-8">{{$hv->naturaleza_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Limites de empleo</th>
                        <td colspan="1" class="col-8">{{$hv->limites_empleo}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Condiciones de uso y almacenamiento</th>
                        <td colspan="1" class="col-8">{{$hv->condiciones_uso_almacenamiento}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Observaciones</th>
                        <td colspan="1" class="col-8">{{$hv->observaciones}}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="col-4" style="text-align: center;">Resumen de la calibracion</th>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Nombre del equipo</th>
                        <td colspan="1" class="col-8">{{$hv->nombre_equipo}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Número de inventario</th>
                        <td colspan="1" class="col-8">{{$hv->numero_inventario}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Fecha de la ultima calibracion</th>
                        <td colspan="1" class="col-8">{{$hv->fecha_ultima_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Fecha de la proxima calibracion</th>
                        <td colspan="1" class="col-8">{{$hv->fecha_proxima_calibracion}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Limitaciones de uso</th>
                        <td colspan="1" class="col-8">{{$hv->limitaciones_uso}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Fecha de mantenimiento</th>
                        <td colspan="1" class="col-8">{{$hv->fecha_mantenimiento}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Actividad realizada</th>
                        <td colspan="1" class="col-8">{{$hv->actividad_realizada}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Quien realizo el mantenimiento</th>
                        <td colspan="1" class="col-8">{{$hv->quien_realizo_mantenimiento}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" class="col-4">Observaciones de la calibracion</th>
                        <td colspan="1" class="col-8">{{ $hv->observaciones_calibracion}}</td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>

            </table>
        </div>
    </section>



</x-layout>
