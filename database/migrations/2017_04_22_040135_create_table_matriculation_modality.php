<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatriculationModality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculation_modality', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price')->default(0);
            $table->double('total')->default(0);
            $table->integer('status')->default(1);
            $table->integer('modality_id')->unsigned()->index();
            $table->foreign('modality_id')->references('id')->on('modalities');
            $table->integer('matriculation_id')->unsigned()->index();
            $table->foreign('matriculation_id')->references('id')->on('matriculation');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('matriculation_modality');
    }
}
