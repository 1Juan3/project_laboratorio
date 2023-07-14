<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratorio_4', function (Blueprint $table) {
            $table->string('codigo_producto', 100);
            $table->string('nombre_sustancia', 100);
            $table->date('fecha_inventario');
            $table->string('numero_gabeta', 50);
            $table->string('nombre_fabricante', 100);
            $table->string('proveedor_compra', 100);
            $table->string('utiliza_sustancia',10);
            $table->date('fecha_vencimiento');
            $table->string('observaciones', 255);
            $table->string('posee_etiqueta', 10);
            $table->string('se_trasvasa', 10);
            $table->integer('cant_inventariada', 10);
            $table->string('estado_sustancia', 100);
            $table->string('frecuencia_uso', 100);
            $table->string('unidad_medida', 10);
            $table->integer('id_matriz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('laboratorio_4');
    }
};
