<x-layout titulo="Equipo">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/sustancia.css') }}">
    </x-slot>



    @foreach ($equipo as $item)
        <div class="card  mx-auto " style="width: 20rem; margin-top:20px; margin-bottom: 20px; ">
            <img src="{{ route('getImagenEquipo', $item->imagen) }}" alt="imagen equipo" style="height: 200px;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->equipo }}</h5>
                <label for=""><b>Observaciones</b></label>
                <p class="card-text">{{ $item->observaciones }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <label for=""><b>Unidades</b></label>
                <li class="list-group-item">{{ $item->unidades }}</li>
                <label for=""><b>Ubicacion</b></label>
                <li class="list-group-item">{{ $item->ubicacion }}</li>
                <label for=""><b>Frecuencia de mantenimiento preventivo/correctivo/calibracion</b></label>
                <li class="list-group-item">{{ $item->frec_mantenimiento }}</li>
            </ul>
            <div class="card-body" style="display: flex; flex-direction: column;">
                <a href="{{ route('getFacturaEquipo', $item->factura) }} " target=" _blank" class="card-link">Ver la
                    factura del equipo</a>
                <a href="{{ route('getManualEquipo', $item->manual_usuario) }} " target=" _blank" class="card-link">Ver
                    el manual de usuario</a>
            </div>
            <a href="{{ route('verHv', $item->id) }}"type="button" class="btn btn-outline-warning"
                style="margin-bottom: 10px">Hoja de vida</a>

        </div>
    @endforeach



</x-layout>
