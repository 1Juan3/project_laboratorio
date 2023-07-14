<x-layout titulo="sustancia">
  <x-slot name="css"><link rel="stylesheet" href="{{ asset('css/sustancia.css') }}"></x-slot>
    
    <section >
      @foreach($informacion as $item)
      <div class="card" style="width: 20%; margin-top:20px; margin-bottom: 20px; ">
        <img src="{{ route('getImagen', $item->imagen_reactivo) }}" alt="imagen sustancia" style="height: 200px; width: 200px ">
          <div class="card-body">
            <h5 class="card-title">{{$item->nombre_reactivo}}</h5>
            <label for=""><b>Observaciones</b></label>
            <p class="card-text">{{$item->observaciones}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <label for=""><b>Fecha vencimiento</b></label>
            <li class="list-group-item">{{$item->fecha_vencimiento}}</li>
            <label for=""><b>Cantidad de la sustancia</b></label>
            <li class="list-group-item">{{$item->cant_reactivo}}</li>
            <label for=""><b>Unidad de medida de la sustancia</b></label>
            <li class="list-group-item">{{$item->unidad_medida}}</li>
          </ul>
          <div class="card-body">
            <a href="{{ route('getPdf', $item->ficha_seguridad) }} " target=" _blank" class="card-link">Ficha seguridad</a>
          </div>
          <a href="{{route('viewEditar' , $item->codigo_laboratorio1)}}"type="button" class="btn btn-outline-warning" style="margin-bottom: 10px">Utilizar sustancia</a>
          <a href="{{ route('viewEliminar', ['id' => $item->codigo_laboratorio1, 'id_sustancia' => $item->id]) }}" type="button" class="btn btn-outline-danger" style="margin-bottom: 10px">Eliminar sustancia</a>
        </div>
        @endforeach
    </section>

</x-layout>
