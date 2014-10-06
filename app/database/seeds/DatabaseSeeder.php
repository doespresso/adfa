<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

	    $this->call('MagazinsTableSeeder');
        $this->call('StylesTableSeeder');
//      $this->call('PortfoliosTableSeeder');
//	    $this->call('PublicationsTableSeeder');
        $this->call('MenusTableSeeder');
//        $this->call('PhotosTableSeeder');
//        $this->call('PostsTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('ContentsTableSeeder');
//        $this->call('EventsTableSeeder');
        $this->call('PersonsTableSeeder');
	}

}
