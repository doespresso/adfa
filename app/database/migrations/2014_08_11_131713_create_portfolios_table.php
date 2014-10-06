<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfoliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('alias')->unique();
            $table->string('front_img')->nullable();
			$table->text('preambula')->nullable();
			$table->text('description')->nullable();
			$table->integer('style_id')->nullable();
			$table->integer('area')->nullable();
			$table->integer('year')->nullable();
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
		Schema::drop('portfolios');
	}

}
