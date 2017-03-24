<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileTable extends Migration {

	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name', 200);
            $table->string('name_original')->nullable();
			$table->text('full_path');
			$table->string('mime_type');
			$table->string('media_type',10);
			$table->integer('flag')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});

        Schema::table('files', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

	}

	public function down()
	{
		Schema::drop('files');
	}
}