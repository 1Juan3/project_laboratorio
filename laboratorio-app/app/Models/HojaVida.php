<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaVida extends Model
{
    use HasFactory;
    protected $table = 'hoja_vida';
    protected $fillable = ['nombre_equipo', 'marca_fabricante', 'referencia','modelo','numero_serie','numero_codificacion','campo_medida','fecha_inicio_servicio','condiciones_utilizacion','valor_equipo','factura_compra','pais_fabricacion','descripcion','grupos_calibracion','intervalo_calibracion','fecha_calibracion','procedimiento_calibracion','resultado_calibracion','localizacion','naturaleza_calibracion','limites_empleo','condiciones_uso_almacenamiento','observaciones','pais_origen','observaciones_variables','numero_inventario','fecha_ultima_calibracion','fecha_proxima_calibracion','limitaciones_uso','fecha_mantenimiento','actividad_realizada','quien_realizo_mantenimiento','observaciones_calibracion'];
    protected $guarded =[];
}
