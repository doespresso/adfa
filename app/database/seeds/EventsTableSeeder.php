<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Cal::create([
                'title'=>$faker->sentence($nbWords = 6),
                'date' => $faker->date($format = 'Y-m-d', $max = '+1 month'),
                'time' => $faker->time($format = 'H:i:s', $max = '24:00:00'),
                'duration' => $faker->numberBetween($min = 30, $max = 180),
                'description'=>$faker->sentence($nbWords = 6),
                'full'=>$faker->sentence($nbWords = 12),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
			]);
		}
	}

}