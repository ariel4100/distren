<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\Metadata',5)->create();
        factory('App\Termination',20)->create();
        factory('App\Content',20)->create();
        factory('App\Slider',20)->create();
        factory('App\Category',20)->create();
        factory('App\Closure',20)->create();
        factory('App\Capacity',20)->create();
    }
}
