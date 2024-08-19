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
        Schema::create('itens_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listacompra_id');
            $table->unsignedBigInteger('item_id');
            $table->decimal('valor_unitario');
            $table->integer('quantidade');
            $table->foreign('listacompra_id')->references('id')->on('listadecompras');
            $table->foreign('item_id')->references('id')->on('itens');
            $table->enum('status',['ativo','desativado']);
            $table->timestamps();         

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('itens_compras');
    }
};
