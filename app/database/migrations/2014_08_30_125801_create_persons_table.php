<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persons', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('content_id')->default(1)->nullable();
			$table->string('title');
            $table->string('description')->nullable();
			$table->string('position')->nullable();
			$table->mediumtext('bio')->nullable();
			$table->string('quote')->nullable();
			$table->mediumtext('quotetext')->nullable();
			$table->string('vk')->nullable();
			$table->string('fb')->nullable();
			$table->string('insta')->nullable();
			$table->string('twitter')->nullable();
			$table->string('img')->nullable();
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
		Schema::drop('persons');
	}

}
