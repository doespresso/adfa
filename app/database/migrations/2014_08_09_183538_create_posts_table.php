<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('person_id')->nullable();
			$table->string('title');
			$table->string('preambula')->nullable();
			$table->text('text')->nullable();
			$table->string('thumb')->nullable();
			$table->string('img')->nullable();
			$table->integer('cat_id')->nullable();
			$table->string('alias')->unique();
			$table->string('alt')->nullable();
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
		Schema::drop('posts');
	}

}
