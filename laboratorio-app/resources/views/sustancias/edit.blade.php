<x-layout>

    <form action="{{ route('editSustancia', $reactivo->id) }}"method="POST" enctype="multipart/form-data"
        class="col-6 mx-auto">
        @csrf
        <h1>Editar el reactivo {{ $reactivo->nombre_sustancia }}</h1>

        <select class="form-select" aria-label="Default select example" name="nombre_laboratorio"
            value="{{ old('nombre_laboratorio', $reactivo->nombre_laboratorio) }}" style="margin-bottom: 20px;">

            <option selected="">{{ $reactivo->nombre_laboratorio }}</option>
            @foreach ($laboratorios as $laboratorio)
                <option value="{{ $laboratorio->nombre_laboratorio }}">
                    {{ $laboratorio->nombre_laboratorio }}</option>
            @endforeach
        </select>


        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput1" name="id"
                value="{{ old('id', $reactivo->id) }}" placeholder="Codigo del reactivo">
            <label for="floatingInput">Codigo del reactivo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control"
                value="{{ old('nombre_sustancia ', $reactivo->nombre_sustancia) }}"
                id="floatingInput2"placeholder="Nombre del reactivo" name="nombre_sustancia">
            <label>Nombre del reactivo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" placeholder="Fecha Inventario"
                value="{{ old('fecha_inventario', $reactivo->fecha_inventario) }}" name="fecha_inventario">
            <label>Fecha Inventario</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ old('numero_gabeta', $reactivo->numero_gabeta) }}"
                placeholder="Nombre de la gabeta donde se encuentra" name="numero_gabeta">
            <label>Nombre de la gabeta donde se encuentra</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Nombre del fabricante"
                value="{{ old('nombre_fabricante', $reactivo->nombre_fabricante) }}" name="nombre_fabricante">
            <label>Nombre del fabricante</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Proveedor de compra"
                value="{{ old('proveedor_compra', $reactivo->proveedor_compra) }}" name="proveedor_compra">
            <label>Proveedor de compra</label>
        </div>
        <select class="form-select" aria-label="Default select example" name="utiliza_sustancia"
            value="{{ old('utiliza_sustancia', $reactivo->utiliza_sustancia) }}" style="margin-bottom: 20px;">
            <option selected="">{{ $reactivo->utiliza_sustancia }}</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" placeholder="Fecha Vencimiento"
                value="{{ old('fecha_vencimiento', $reactivo->fecha_vencimiento) }}" name="fecha_vencimiento">
            <label>Fecha Vencimiento</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="observaciones" id="floatingTextarea2" placeholder="Observaciones"
                value="{{ old('observaciones ', $reactivo->observaciones) }}" style="height: 100px"></textarea>
            <label>Observaciones</label>
        </div>
        <select class="form-select" aria-label="Default select example" name="posee_etiqueta"
            value="{{ old('posee_etiqueta ', $reactivo->posee_etiqueta) }}" style="margin-bottom: 20px;">
            <option selected="">{{ $reactivo->posee_etiqueta }}</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <select class="form-select" aria-label="Default select example" name="se_trasvasa"
            value="{{ old('se_trasvasa ', $reactivo->se_trasvasa) }}" style="margin-bottom: 20px;">
            <option selected="">{{ $reactivo->se_trasvasa }}</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Frecuencia de uso"
                value="{{ old('frecuencia_uso ', $reactivo->frecuencia_uso) }}" name="frecuencia_uso">
            <label>Frecuencia de uso</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Unidad de medida"
                value="{{ old('unidad_medida ', $reactivo->unidad_medida) }}" name="unidad_medida">
            <label>Unidad de medida</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="Cantidad de unidades"
                value="{{ old('cant_inventariada ', $reactivo->cant_inventariada) }}" name="cant_inventariada">
            <label>Cantidad unidades</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="Cantidad neto por producto"
                value="{{ old('cantidad_neto ', $reactivo->cantidad_neto) }}" name="cantidad_neto">
            <label>Cantidad neto por producto</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="estado de la sustancia"
                value="{{ old('estado_sustancia ', $reactivo->estado_sustancia) }}" name="estado_sustancia">
            <label>Estado de la sustancia</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" placeholder="Cantidad total de producto inventariada"
                name="imagen">
            <label>Ingrese la imagen del la sustancia</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" placeholder="Cantidad total de producto inventariada"
                name="ficha_seguridad">
            <label>Ingrese la ficha de seguridad de la sustancia</label>
        </div>


        <button type="submit" class="btn btn-primary">Actualizar reactivo</button>

    </form>
</x-layout>
