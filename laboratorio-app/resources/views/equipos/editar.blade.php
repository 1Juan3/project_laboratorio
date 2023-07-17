<x-layout>

    <form action="{{ route('updatedEquipo', $id) }}"method="POST" enctype="multipart/form-data" class="col-3 mx-auto">
        <h1>Editar {{ $equipo->equipo }}</h1>
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput1" name="equipo" placeholder="Nombre del equipo "
                value="{{ old('equipo', $equipo->equipo) }}">
            <label for="floatingInput">Nombre del equipo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput2"placeholder="Unidades" name="unidades"
                value="{{ old('unidades', $equipo->unidades) }}">
            <label>Unidades</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="Valor de compra"
                value="{{ old('valor_compra', $equipo->valor_compra) }}" name="valor_compra">
            <label>Valor de compra</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ old('ubicacion', $equipo->ubicacion) }}"
                placeholder="Ubicacion" name="ubicacion">
            <label>Ubicacion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Frecuencia de mantenimiento"
                value="{{ old('frec_mantenimiento', $equipo->frec_mantenimiento) }}" name="frec_mantenimiento">
            <label>Frecuencia de mantenimiento</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Programa academico"
                value="{{ old('pro_academico', $equipo->pro_academico) }}" name="pro_academico">
            <label>Programa academico</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Nombre del documento de soporte"
                value="{{ old('documento_soporte', $equipo->documento_soporte) }}" name="documento_soporte">
            <label>Nombre del documento de soporte</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Usos" value="{{ old('usos', $equipo->usos) }}"
                name="usos">
            <label>Usos</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Observaciones" id="floatingTextarea2" style="height: 100px"
                name="observaciones" value="{{ old('observaciones', $equipo->observaciones) }}"></textarea>
            <label for="floatingTextarea2">Observaciones</label>
        </div>
        <select class="form-select mt-2" aria-label="Default select example" name="fichas_fisico"
            style="margin-bottom: 20px;">
            <option selected="">{{ $equipo->fichas_fisico }}</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" placeholder="Cantidad total de producto inventariada"
                name="imagen" value="{{ old('imagen', $equipo->imagen) }}">
            <label>Ingrese la imagen del la equipo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" placeholder="Cantidad total de producto inventariada"
                name="factura" value="{{ old('factura', $equipo->factura) }}">
            <label>Factura</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" placeholder="Cantidad total de producto inventariada"
                name="manual" value="{{ old('manual', $equipo->manual) }}">
            <label>Manual de usuario</label>
        </div>

        <button type="submit" class="btn btn-secondary mb-3 " data-bs-dismiss="modal">Actualizar informacion</button>
    </form>
</x-layout>
