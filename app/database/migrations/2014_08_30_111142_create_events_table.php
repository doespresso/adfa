<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('description')->nullable();
			$table->mediumText('full')->nullable();
			$table->date('date');
			$table->time('time')->nullable();
			$table->integer('duration')->nullable();
			$table->string('img')->nullable();
            $table->smallInteger('active')->default(1);
            $table->smallInteger('sticky')->default(0);
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
		Schema::drop('events');
	}

}
