<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('manager')->nullable();
            $table->text('address');
            $table->string('email')->nullable()->unique();
            $table->string('city');
            $table->string('phone',20);
            $table->string('fax',20)->nullable();
            $table->integer('status')->default(1);
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('company');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('island_id')->unsigned()->index();
            $table->foreign('island_id')->references('id')->on('islands');
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
        Schema::drop('branches');
    }
}
