<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecureComparticipation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secure_comparticipation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->default(0);
            $table->double('max_value')->default(0);
            $table->integer('deadline')->default(0);
            $table->integer('max_frequency')->default(0);
            $table->integer('status')->default(1);
            $table->integer('consult_type_id')->unsigned()->index();
            $table->foreign('consult_type_id')->references('id')->on('consult_type');
            $table->integer('secure_agency_id')->unsigned()->index();
            $table->foreign('secure_agency_id')->references('id')->on('secure_agency');
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
        Schema::dropIfExists('secure_comparticipation');
    }
}
