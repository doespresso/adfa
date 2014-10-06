<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PagesTableSeeder extends Seeder {

	public function run()
	{
//		$faker = Faker::create();

//		foreach(range(1, 10) as $index)
//		{
//			Menus::create([
//
//			]);
//		}

        Page::create(['title'=>'artdefacto','alias'=>'/','controller_name'=>'Home']);
        Page::create(['title'=>'дизайнеры','alias'=>'designers','controller_name'=>'Person']);
        Page::create(['title'=>'портфолио','alias'=>'portfolio','controller_name'=>'Portfolio']);
        Page::create(['title'=>'пресса','alias'=>'press','controller_name'=>'Press']);
        Page::create(['title'=>'тренды и брэнды','alias'=>'designtrends','controller_name'=>'Post']);
        Page::create(['title'=>'контакты','alias'=>'contact','controller_name'=>'Contact']);
	}

}