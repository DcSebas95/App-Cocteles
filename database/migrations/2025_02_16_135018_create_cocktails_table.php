<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cocktails', function (Blueprint $table) {
        $table->id();
        $table->string('strDrink');      // Nombre del cóctel
        $table->string('strCategory');   // Categoría
        $table->string('strAlcoholic');  // Indica si es alcohólico o no
        $table->text('strInstructions')->nullable(); // Instrucciones
        $table->string('strDrinkThumb')->nullable(); // URL de la imagen
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocktails');
    }
};
