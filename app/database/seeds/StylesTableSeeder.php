<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StylesTableSeeder extends Seeder {

	public function run()
	{
        Style::create(['title'=>'ар дэко']);
        Style::create(['title'=>'классика']);
        Style::create(['title'=>'минимализм']);
        Style::create(['title'=>'модерн']);
        Style::create(['title'=>'фьюжн']);
	}

}