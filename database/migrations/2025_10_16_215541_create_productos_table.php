<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
           $table->id();
           $table->string('nombre', 200);
          $table->text('descripcion')->nullable();
          $table->decimal('precio', 10, 2);
          $table->integer('stock')->default(0);
          $table->unsignedBigInteger('categoria_id');
           $table->string('codigo_barras', 50)->unique();
          $table->string('imagen', 255)->nullable();
         $table->boolean('activo')->default(true);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
