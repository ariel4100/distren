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
        $this->call([
            UserSeeder::class,
            ContentSeeder::class,
            MetadataSeeder::class,
            CategorySeeder::class,
            SliderSeeder::class,
        ]);
        factory('App\Termination',10)->create();
        factory('App\Subcategory',10)->create();
        factory('App\Closure',10)->create();
        factory('App\Capacity',10)->create();
    }
}
