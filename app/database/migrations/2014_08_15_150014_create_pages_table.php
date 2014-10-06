<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('content')->nullable();
			$table->string('alias')->unique();
			$table->string('controller_name')->nullable();
			$table->smallInteger('active')->default(1);
			$table->smallInteger('show_brand')->nullable()->default(null);
			$table->smallInteger('show_slogan')->nullable()->default(null);
			$table->smallInteger('show_title_static')->nullable()->default(null);
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
		Schema::drop('pages');
	}

}
