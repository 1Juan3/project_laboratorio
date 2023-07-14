<x-layout titulo="eliminar sustancia ">
  <form action="{{ route('delete', ['id' => $id, 'id_sustancia' => $id_sustancia]) }}" method="POST">
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
            <label>¿Por que la elimina?</label>
          </div>
        </div>
        <div style="display: flex; justify-content: center;  align-items: center; margin-bottom: 300px; ">
          <a type="button" class="btn btn-outline-secondary" href="{{route('viewReactivo', $id)}}">Cancelar</a>  
          <button type="submit" class="btn btn-outline-danger" style="margin-right: 20px">Terminar</button>
      
        </div>
      </form>
</x-layout>