<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConsultAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consult_agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note')->nullable();
            $table->date('date');
            $table->time('start_time',48);
            $table->time('end_time',48);
            $table->string('all_day',5);
            $table->integer('status')->default(1);
            $table->integer('consult_type_id')->unsigned()->index();
            $table->foreign('consult_type_id')->references('id')->on('consult_type');
            $table->integer('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('employees');
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
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
        Schema::dropIfExists('consult_agenda');
    }
}
