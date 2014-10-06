<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


            foreach(range(1, 10) as $index)
            {
                Post::create([
                    'title'=>$faker->sentence($nbWords = 6),
                    'preambula' => $faker->text($maxNbChars = 400),
                    'thumb' => 'images/portfolio/front/int'.$faker->numberBetween($min = 1, $max = 4).'.jpg',
                    'img' => 'images/portfolio/front/int'.$faker->numberBetween($min = 1, $max = 4).'.jpg',
                ]);
            }

	}

}