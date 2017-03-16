<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('website');
            $table->string('owner');
            $table->string('area');
            $table->string('phone',20);
            $table->string('fax',20);
            $table->string('logo')->default('img/round-logo.jpg');
            $table->string('nif');
            $table->text('address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('facebook')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('company');
    }
}
