<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PublicationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
//			Publication::create([
//                'title'=>'публикация в издании',
//                'pub_holder_id'=>1,//$faker->numberBetween($min = 1, $max = 10),
//                'pub_holder_type'=>'Portfolio',
//                'photographer'=>$faker->name,
//                'magazin_id'=>$faker->numberBetween($min = 1, $max = 5),
//                'year' => $faker->year($max = 'now'),
//                'number' => $faker->numberBetween($min = 1, $max = 12),
//                'str' => $faker->numberBetween($min = 1, $max = 100),
//			]);
		}
	}

}