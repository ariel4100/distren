<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'FARMACIA',
            'image' => 'uploads/categorias/rNGY26aQDPNBc12hg1FqhFf6lfEgoFr3CBGTWctH.png',
            'order' => 'aa',
        ]);
        DB::table('categories')->insert([
            'title' => 'PERFUMERÍA Y COSMÉTICA',
            'image' => 'uploads/categorias/BpZ0bC61da20RtmqHbbH2jLCx0qczMshFjXY4Cp2.png',
            'order' => 'bb',
        ]);
        DB::table('categories')->insert([
            'title' => 'ALIMENTICIOS',
            'image' => 'uploads/categorias/rNGY26aQDPNBc12hg1FqhFf6lfEgoFr3CBGTWctH.png',
            'order' => 'cc',
        ]);
    }
}
