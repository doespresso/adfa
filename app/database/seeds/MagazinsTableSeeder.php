<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MagazinsTableSeeder extends Seeder {

    public function run()
    {

        Magazin::create(['title'=>'Salon Interior', 'logo'=>'images/magazines/logos/salon.png', 'logo_inv'=>'images/magazines/logos/black/salon.png']);
        Magazin::create(['title'=>'DOM & Интерьер', 'logo'=>'images/magazines/logos/domandint.png', 'logo_inv'=>'images/magazines/logos/black/domandint.png']);
        Magazin::create(['title'=>'Архидом', 'logo'=>'images/magazines/logos/archidom.png', 'logo_inv'=>'images/magazines/logos/black/archidom.png']);
        Magazin::create(['title'=>'Лучшие Интерьеры', 'logo'=>'images/magazines/logos/bestinterior.png', 'logo_inv'=>'images/magazines/logos/black/bestinterior.png']);
        Magazin::create(['title'=>'Идеи вашего дома', 'logo'=>'images/magazines/logos/homeideas.png', 'logo_inv'=>'images/magazines/logos/black/homeideas.png']);
    }

}