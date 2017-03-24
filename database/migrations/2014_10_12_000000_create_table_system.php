<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('theme');
            $table->string('lang');
            $table->string('currency');
            $table->string('layout');
            $table->string('background_image')->default('img/photo1.png');
            $table->string('status')->default(1);
            $table->timestamps();
            $table->string('timezone')->default('Atlantic/Cape_Verde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system');
    }
}
