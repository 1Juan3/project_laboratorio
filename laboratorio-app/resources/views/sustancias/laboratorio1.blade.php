<x-layout titulo="{{ $nombre_laboratorio }}">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/laboratorio1.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    </x-slot>
    <section style="display: flex; justify-content: center; align-items: baseline; margin-top:40px;">
        <strong style="width: 20%">Lista de reactivos en el {{ $nombre_laboratorio }}</strong>


        <a href="{{ route('getMatriz', ['nombre_laboratorio' => $nombre_laboratorio]) }}" target="_blank">

            Ver Matriz de compatibilidad
        </a>

        <!-- Button trigger modal -->
        <div class="boton" style="width: 30%">
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear Reactivo
            </button>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Reactivo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('postReactivo') }}"method="POST" enctype="multipart/form-data">
                            @csrf


                            <select class="form-select" aria-label="Default select example" name="laboratorio"
                                style="margin-bottom: 20px;">

                                <option selected="">Seleccione el laboratorio</option>
                                @foreach ($laboratorios as $laboratorio)
                                    <option value="{{ $laboratorio->nombre_laboratorio }}">
                                        {{ $laboratorio->nombre_laboratorio }}</option>
                                @endforeach
                            </select>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput1" name="codigo"
                                    placeholder="Codigo del reactivo">
                                <label for="floatingInput">Codigo del reactivo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="floatingInput2"placeholder="Nombre del reactivo" name="nombre">
                                <label>Nombre del reactivo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" placeholder="Fecha Inventario"
                                    name="fecha_inventario">
                                <label>Fecha Inventario</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    placeholder="Nombre de la gabeta donde se encuentra" name="nombre_gabeta">
                                <label>Nombre de la gabeta donde se encuentra</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Nombre del fabricante"
                                    name="nombre_fabricante">
                                <label>Nombre del fabricante</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Proveedor de compra"
                                    name="proveedor">
                                <label>Proveedor de compra</label>
                            </div>
                            <select class="form-select" aria-label="Default select example" name="utiliza"
                                style="margin-bottom: 20px;">
                                <option selected="">¿Se utiliza esta sustancia?</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" placeholder="Fecha Vencimiento"
                                    name="date_venc">
                                <label>Fecha Vencimiento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="observacion" id="floatingTextarea2" placeholder="Observaciones"
                                    style="height: 100px"></textarea>
                                <label>Observaciones</label>
                            </div>
                            <select class="form-select" aria-label="Default select example" name="etiqueta"
                                style="margin-bottom: 20px;">
                                <option selected="">¿Posee etiqueta?</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="trasvasa"
                                style="margin-bottom: 20px;">
                                <option selected="">¿Se Trasvasa?</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Frecuencia de uso"
                                    name="fre_uso">
                                <label>Frecuencia de uso</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Unidad de medida"
                                    name="u_med">
                                <label>Unidad de medida</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Cantidad de unidades"
                                    name="cant_inv">
                                <label>Cantidad unidades</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Cantidad neto por producto"
                                    name="cantidad">
                                <label>Cantidad neto por producto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="estado de la sustancia"
                                    name="estado">
                                <label>Estado de la sustancia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="imagen">
                                <label>Ingrese la imagen del la sustancia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="ficha_seguridad">
                                <label>Ingrese la ficha de seguridad de la sustancia</label>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear reactivo</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </section>


    <div class="bd-example">
        <table class="table table-striped table-hover border-dark " id="reactivos" style="width:100%">

            <thead class="">
                <tr>
                    <th scope="col">Nombre laboratorio</th>
                    <th scope="col">Codigo del reactivo</th>
                    <th scope="col">Nombre de la sustancia</th>
                    <th scope="col">fecha de inventario</th>
                    <th scope="col">numero gabeta</th>
                    <th scope="col">Nombre del fabricante</th>
                    <th scope="col">Proveedor de compra</th>
                    <th scope="col">Utiliza esta sustancia</th>
                    <th scope="col">Fecha vencimiento</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Posee etiqueta</th>
                    <th scope="col">Se trasvasa</th>
                    <th scope="col">Cantidad inventariada</th>
                    <th scope="col">Cantidad neto</th>
                    <th scope="col">Estado de la sustancia</th>
                    <th scope="col">Frecuencia de uso</th>
                    <th scope="col">Unidad de medida</th>
                    <th scope="col">editar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">Nombre laboratorio</th>
                    <th scope="col">Codigo del reactivo</th>
                    <th scope="col">Nombre de la sustancia</th>
                    <th scope="col">fecha de inventario</th>
                    <th scope="col">numero gabeta</th>
                    <th scope="col">Nombre del fabricante</th>
                    <th scope="col">Proveedor de compra</th>
                    <th scope="col">Utiliza esta sustancia</th>
                    <th scope="col">Fecha vencimiento</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Posee etiqueta</th>
                    <th scope="col">Se trasvasa</th>
                    <th scope="col">Cantidad inventariada</th>
                    <th scope="col">Cantidad neto</th>
                    <th scope="col">Estado de la sustancia</th>
                    <th scope="col">Frecuencia de uso</th>
                    <th scope="col">Unidad de medida</th>
                    <th scope="col"></th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($informacion as $item)
                    <tr>
                        <td>{{ $item->nombre_laboratorio }}</td>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('viewReactivo', $item->id) }}">{{ $item->nombre_sustancia }}</a>
                        </td>
                        <td>{{ $item->fecha_inventario }}</td>
                        <td>{{ $item->numero_gabeta }}</td>
                        <td>{{ $item->nombre_fabricante }}</td>
                        <td>{{ $item->proveedor_compra }}</td>
                        <td>{{ $item->utiliza_sustancia }}</td>
                        <td>{{ $item->fecha_vencimiento }}</td>
                        <td>{{ $item->observaciones }}</td>
                        <td>{{ $item->posee_etiqueta }}</td>
                        <td>{{ $item->se_trasvasa }}</td>
                        <td>{{ $item->cant_inventariada }}</td>
                        <td>{{ $item->cantidad_neto }}</td>
                        <td>{{ $item->estado_sustancia }}</td>
                        <td>{{ $item->frecuencia_uso }}</td>
                        <td>{{ $item->unidad_medida }}</td>
                        <td><a style="color:black;" href="{{ route('viewEditReactivo', $item->id) }}"><i
                                    class="bi bi-pencil-square"></i></a></td>
                @endforeach
                </tr>
            </tbody>


        </table>

    </div>


    <x-slot name="scripts">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {

                // Setup - add a text input to each footer cell
                $('#reactivos tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" style="margin-left:10px;" placeholder="Buscar ' + title +
                        '" />');
                });
                $('#reactivos').DataTable({

                    responsive: true,
                    autoWidth: false,
                    fixedHeader: true,
                    processing: true,

                    "language": {
                        "lengthMenu": "Mostrar _MENU_ reactivos por pagina",
                        "zeroRecords": "No se encontraron registros - Lo siento",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No se encontro resultado para su busqueda",
                        "infoFiltered": "(filtrado de _MAX_ total reactivos totales)",
                        'search': 'Buscar',
                        'paginate': {
                            'next': 'siguiente',
                            'previous': 'anterior'
                        }
                    },
                    initComplete: function() {
                        // Apply the search
                        this.api()
                            .columns()
                            .every(function() {
                                var that = this;

                                $('input', this.footer()).on('keyup change clear', function() {
                                    if (that.search() !== this.value) {
                                        that.search(this.value).draw();
                                    }
                                });
                            });
                    },


                });


            });
        </script>
    </x-slot>
    <style>
        #reactivos tfoot input {
            width: 100% !important;
        }

        #reactivos tfoot {
            display: table-header-group !important;
        }
    </style>

</x-layout>
