<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PortfoliosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
//			Portfolio::create([
//                'title'=>$faker->sentence($nbWords = 6),
//                'style_id' => $faker->numberBetween($min = 1, $max = 5),
//                'description' => $faker->text($maxNbChars = 400),
//                'area' => $faker->numberBetween($min = 90, $max = 500),
//                'year' => $faker->numberBetween($min = 2003, $max = 2014),
//			]);
		}
	}

}