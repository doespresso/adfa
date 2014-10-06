<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->morphs('pub_holder');
			$table->integer('magazin_id');
			$table->string('title')->nullable();
			$table->string('url')->nullable();
			$table->string('photographer')->nullable();
			$table->text('description')->nullable();
			$table->integer('year');
			$table->integer('number');
			$table->integer('str');
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
		Schema::drop('publications');
	}

}
