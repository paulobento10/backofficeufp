<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_pt');
            $table->string('descricao_pt');
            $table->string('curso_pt');
            $table->string('categoria_pt');
            $table->string('faculdade_pt');
            $table->string('nome_en');
            $table->string('descricao_en');
            $table->string('curso_en');
            $table->string('categoria_en');
            $table->string('faculdade_en');
            $table->string('nome_outro');
            $table->string('descricao_outro');
            $table->string('curso_outro');
            $table->string('categoria_outro');
            $table->string('faculdade_outro');
            $table->date('data');
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
        Schema::dropIfExists('news');
    }
}
