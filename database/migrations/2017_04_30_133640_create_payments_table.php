<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_method')->nullable();
            $table->double('total')->default(0);
            $table->double('value_pay')->default(0);
            $table->longText('note')->nullable();
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tenant_id')->unsigned()->index();
            $table->text('type','50');
            $table->integer('status')->default(1);
            $table->integer('month_id')->nullable();
            $table->integer('item_id')->default(0);
            $table->string('item_type')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->SoftDeletes();

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
        Schema::dropIfExists('payments');
    }
}
