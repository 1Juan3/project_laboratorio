<x-layout titulo="utilizar sustancia">
 
<form action="{{ route('updated', $cantidad->codigo_laboratorio1) }}" method="POST">
  @method('PATCH')
  @csrf
  <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin-top: 30px">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" placeholder="Nombre responsable" name="name_user" style="width: 400px;" required>
      <label>Nombre responsable</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" placeholder="Documento" name="documento" style="width: 400px;" required>
      <label>Documento</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" placeholder="Observacion" name="comentario" style="width: 400px;" required>
      <label>Observacion</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" placeholder="cantidad" name="cantidad" value="{{$cantidad->cant_reactivo}}" style="width: 400px;" >
      <label>cantidad</label>
    </div>
  </div>
  <div style="display: flex; justify-content: center;  align-items: center; margin-bottom: 300px; ">
    <a type="button" class="btn btn-outline-secondary" href="{{route('viewReactivo', $cantidad->codigo_laboratorio1)}}">Cancelar</a>  
    <button type="submit" class="btn btn-outline-success" style="margin-right: 20px">Terminar</button>

  </div>
</form>
</x-layout>