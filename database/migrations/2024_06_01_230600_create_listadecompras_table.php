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
        Schema::create('listadecompras', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->decimal('valor_total');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('local_id');
            $table->enum('status',['comprado','nao_comprado']);
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('local_id')->references('id')->on('locais');
            $table->boolean('default')->default(false);
            $table->decimal('meta', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listadecompras');
    }
};
