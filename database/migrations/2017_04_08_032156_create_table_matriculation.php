<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatriculation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculation', function (Blueprint $table) {
            $table->increments('id');
            $table->text('note')->nullable();
            $table->integer('status')->default(1);

            $table->integer('modality_id')->unsigned()->index();
            $table->foreign('modality_id')->references('id')->on('modalities');
            $table->integer('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('matriculation');
    }
}
