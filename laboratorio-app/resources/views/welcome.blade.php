<x-layout titulo="laboratorios">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </x-slot>
    <div class="modales" style="">
        <!-- Button trigger modal agregar matriz -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModaMatriz">
            Agregar Matriz
        </button>
        <!-- Modal -->
        <div class="modal fade" id="ModaMatriz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Matriz</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('postMatriz') }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            <select class="form-select" aria-label="Default select example" name="nombre_laboratorio"
                                style="margin-bottom: 20px;">
                                <option selected="">Seleccione el laboratorio</option>
                                @foreach ($informacion as $laboratorio)
                                    <option value="{{ $laboratorio->nombre_laboratorio }}">
                                        {{ $laboratorio->nombre_laboratorio }}</option>
                                @endforeach
                            </select>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Ingrese la matriz de compatibilidad" name="matriz">
                                <label>Ingrese la matriz de compatibilidad</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar matriz</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Button trigger modal agregar laboratorio -->
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalLaboratorio">
            Agregar Laboratorio
        </button>
        <!-- Modal -->
        <div class="modal fade" id="ModalLaboratorio" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar laboratorio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addLaboratorio') }}"method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput1" name="nombre_laboratorio"
                                    placeholder="Nombre del laboratorio">
                                <label for="floatingInput">Nombre del laboratorio</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control"
                                    placeholder="Cantidad total de producto inventariada" name="imagen">
                                <label>Ingrese la ficha de seguridad de la sustancia</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar laboratorio</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <section class="laboratorios">
        @foreach ($informacion as $laboratorio)
        <a href="{{ route('view', $laboratorio->nombre_laboratorio) }}" style="text-decoration: none">
            <div class="card" style="height: 300px; background-image: url('{{ asset('images/' . $laboratorio->imagen) }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;"
                >
                {{ $laboratorio->nombre_laboratorio }}
            </div>
        </a>
    @endforeach
    

    </section>




</x-layout>
