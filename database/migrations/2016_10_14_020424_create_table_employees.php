<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('salary_base');
            $table->integer('status')->default(1);

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('bi')->nullable();
            $table->string('nif',9)->nullable();
            $table->string('civil_state');
            $table->string('genre')->nullable();
            $table->date('birthday')->nullable();
            $table->string('parents')->nullable();
            $table->string('nationality')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('avatar')->default('img/avatar.png');
            $table->date('start_work');
            $table->date('end_work')->nullable();
            $table->text('note')->nullable();
            $table->double('salary')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('employees_category');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')->on('tenants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('employees_category');
    }
}
