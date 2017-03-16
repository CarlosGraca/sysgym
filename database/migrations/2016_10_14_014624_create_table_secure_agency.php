<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecureAgency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secure_agency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('phone',20);
            $table->string('fax',20)->nullable();
            $table->string('nif')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('zip_code')->nullable();
            $table->string('avatar')->default('img/round-logo.jpg');
            $table->integer('status')->default(1);
            $table->integer('island_id')->unsigned()->index();
            $table->foreign('island_id')->references('id')->on('islands');
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
        Schema::dropIfExists('secure_agency');
    }
}
