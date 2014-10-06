<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PersonsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Person::create([
            'title' => 'Юлия Михайлова',
            'position' => 'дизайнер интерьера, декоратор',
            'quote' => 'Клиенты нас не рекомендуют',
            'quotetext' => 'Клиенты нас не рекомендуют - это, конечно, такой каламбур',
            'img' => 'images/persons/mihailova.jpg',
        ]);
        Person::create([
            'title' => 'Александр Куценко',
            'position' => 'дизайнер интерьера, архитектор',
            'quote' => 'Вменяемый клиент никогда не заплатит просто за красивые картинки',
            'quotetext' => 'Важен весь процесс, под ключ',
            'img' => 'images/persons/kutsenko.jpg',
        ]);

    }

}