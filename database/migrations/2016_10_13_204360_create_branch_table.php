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
            $table->string('city')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->integer('status')->default(1);
            $table->string('avatar')->default('img/round-logo.jpg');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->integer('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')->on('tenants');
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
        Schema::drop('branches');
    }
}
