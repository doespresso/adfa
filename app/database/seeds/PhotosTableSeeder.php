<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PhotosTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 2) as $index1) {
            foreach (range(1, 6) as $index) {
                Photo::create([
                    'holder_id' => $index1, //$faker->numberBetween($min = 1, $max = 10),
                    'holder_type' => 'Portfolio',
                    'img_orig' =>'foto/int'. $index . '.jpg',
//                    'img' => '/images/portfolio/front/int' . $index . '.jpg',
//                    'img_small' => '/images/portfolio/front/thumb/int' . $index . '.jpg',
                ]);
            }
        }

    }
}