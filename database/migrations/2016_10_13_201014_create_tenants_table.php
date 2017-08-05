<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 250)->unique();
            $table->string('subdomain_name', 120)->unique();
            $table->string('address_1', 200)->nullable();
            $table->string('address_2', 250)->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('logo')->default('img/round-logo.jpg');
            $table->string('nif')->nullable();
            $table->string('city', 120)->nullable();
            $table->string('zip_code')->default(0);
            $table->string('facebook')->nullable();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();  
            $table->tinyInteger('active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('tenant_id')->unsigned()->default(0);
        });
        Schema::table('domains', function (Blueprint $table) {
            $table->integer('tenant_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
