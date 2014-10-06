<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MenusTableSeeder extends Seeder {

	public function run()
	{
//		$faker = Faker::create();

//		foreach(range(1, 10) as $index)
//		{
//			Menus::create([
//
//			]);
//		}

        Menu::create(['title'=>'дизайнеры','cat_id'=>1,'url'=>'/designers']);
        Menu::create(['title'=>'портфолио','cat_id'=>1,'url'=>'/portfolio/']);
        Menu::create(['title'=>'тренды и брэнды','cat_id'=>1,'url'=>'/designtrends/']);
        Menu::create(['title'=>'пресса','cat_id'=>1,'url'=>'/press/']);
        Menu::create(['title'=>'контакты','cat_id'=>1,'url'=>'/contact/']);
	}

}