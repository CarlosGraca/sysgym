<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('bi')->nullable();
            $table->string('nif',9)->nullable();
            $table->string('civil_state')->nullable();
            $table->string('genre')->nullable();
            $table->date('birthday')->nullable();
            $table->string('parents')->nullable();
            $table->string('nationality')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('profession')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('work_address')->nullable();
            $table->integer('zip_code')->default(0);
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('avatar')->default('img/avatar.png');
            $table->integer('secure_card_id')->default(0);
            $table->integer('has_secure')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patients', function ($table) {
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
