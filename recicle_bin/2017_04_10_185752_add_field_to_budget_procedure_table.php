<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToMatriculationProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculation_procedure', function (Blueprint $table) {
            $table->double('value_pay')->default(0);
            $table->double('remaining')->default(0);
            $table->double('payment_status')->default(0);
            $table->double('treatment_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculation_procedure', function (Blueprint $table) {
            //
        });
    }
}
