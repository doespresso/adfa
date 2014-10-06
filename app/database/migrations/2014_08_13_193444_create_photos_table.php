<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->morphs('holder');
			$table->string('description')->nullable();
			$table->string('img')->nullable();
			$table->string('test')->nullable();
			$table->string('img_orig')->nullable();
			$table->string('img_big')->nullable();
			$table->string('img_medium')->nullable();
			$table->string('img_thumb')->nullable();
			$table->string('img_small')->nullable();
			$table->smallInteger('active')->default(1);
			$table->integer('sort')->default(100);
			$table->timestamps(false);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}
