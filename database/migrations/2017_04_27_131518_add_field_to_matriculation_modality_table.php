<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToMatriculationModalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculation_modality', function (Blueprint $table) {
            $table->double('value_pay')->default(0);
            $table->double('iva')->default(0);
            $table->double('remaining')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('matriculation_status')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculation_modality', function (Blueprint $table) {
            //
        });
    }
}
