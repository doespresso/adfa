<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slides', function(Blueprint $table)
		{
			$table->increments('id');
			$table->morphs('holder');
			$table->integer('slidetype_id');
			$table->string('title')->nullable();
			$table->string('content_type')->nullable();
			$table->string('content_id')->nullable();
			$table->smallInteger('active')->default(1);
			$table->integer('sort')->default(100);
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
		Schema::drop('slides');
	}

}
