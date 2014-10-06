<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContentsTableSeeder extends Seeder {

	public function run()
	{
        Content::create(['title'=>'Персона и цитата']);
        Content::create(['title'=>'Элемент портфолио']);
        Content::create(['title'=>'Элемент блога']);
	}

}