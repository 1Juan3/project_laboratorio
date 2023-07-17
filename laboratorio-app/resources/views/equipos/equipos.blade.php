<x-layout titulo="equipos">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/equipos.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"> --}}
    </x-slot>
    <section style="display: flex; justify-content: center; align-items: baseline">
        <strong style="width: 50%">Lista de equipos</strong>



        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear equipo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear equipo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('postEquipo') }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput1" name="nombre"
                                    placeholder="Nombre del equipo ">
                                <label for="floatingInput">Nombre del equipo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput2"placeholder="Unidades"
                                    name="unidades">
                                <label>Unidades</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Valor de compra"
                                    name="valor_compra">
                                <label>Valor de compra</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Ubicacion" name="ubicacion">
                                <label>Ubicacion</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Frecuencia de mantenimiento"
                                    name="frec_mantenimiento">
                                <label>Frecuencia de mantenimiento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Programa academico"
                                    name="pro_academico">
                                <label>Programa academico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Nombre del documento de soporte"
                                    name="documento_soporte">
                                <label>Nombre del documento de soporte</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Usos" name="usos">
                                <label>Usos</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Observaciones" id="floatingTextarea2" style="height: 100px"
                                    name="observaciones"></textarea>
                                <label for="floatingTextarea2">Observaciones</label>
                            </div>
                            <select class="form-select" aria-label="Default select example" name="ficha"
                                style="margin-bottom: 20px;">
                                <option selected="">¿Tiene documento de soporte fisico?</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="imagen">
                                <label>Ingrese la imagen del la equipo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="factura">
                                <label>Factura</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="manual">
                                <label>Manual de usuario</label>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear equipo</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="bd-example">
        <table class="table table-striped table-hover border-dark " id="reactivos">

            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Nombre del equipo</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Valor aproximado de compra</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Frecuencia del mantenimiento</th>
                    <th scope="col">Programa academico</th>
                    <th scope="col">Documento de soporte</th>
                    <th scope="col">usos</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Ficha de equipo fisica</th>
                    <th scope="col">editar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Nombre del equipo</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Valor aproximado de compra</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Frecuencia del mantenimiento</th>
                    <th scope="col">Programa academico</th>
                    <th scope="col">Documento de soporte</th>
                    <th scope="col">usos</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Ficha de equipo fisica</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->id }}</td>
                        <td>
                            <a href="{{ route('verEquipo', $equipo->id) }}">{{ $equipo->equipo }}
                            </a>
                        </td>
                        <td>{{ $equipo->unidades }}</td>
                        <td>{{ $equipo->valor_compra }}</td>
                        <td>{{ $equipo->ubicacion }}</td>
                        <td>{{ $equipo->frec_mantenimiento }}</td>
                        <td>{{ $equipo->pro_academico }}</td>
                        <td>{{ $equipo->documento_soporte }}</td>
                        <td>{{ $equipo->usos }}</td>
                        <td>{{ $equipo->observaciones }}</td>
                        <td>{{ $equipo->fichas_fisico }}</td>
                        <td> <a href="{{ route('viewUpdated', $equipo->id) }}" style="color:black;"><i
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
        {{-- en caso de que quiera agregar botones a la aplicion de exportacion --}}
        {{-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script> --}}
        <script>
            $(document).ready(function() {

                // Setup - add a text input to each footer cell
                $('#reactivos tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
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
