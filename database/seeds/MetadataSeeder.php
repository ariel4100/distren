<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->insert([
            'section' => 'home',
            'keyword' => 'home',
            'description' => 'Descripcion breve de la seccion',
        ]);
        DB::table('metadata')->insert([
            'section' => 'empresa',
            'keyword' => 'empresa',
            'description' => 'Descripcion breve de la seccion',
        ]);
        DB::table('metadata')->insert([
            'section' => 'productos',
            'keyword' => 'productos',
            'description' => 'Descripcion breve de la seccion',
        ]);
        DB::table('metadata')->insert([
            'section' => 'ofertas',
            'keyword' => 'ofertas',
            'description' => 'Descripcion breve de la seccion',
        ]);
        DB::table('metadata')->insert([
            'section' => 'contacto',
            'keyword' => 'contacto',
            'description' => 'Descripcion breve de la seccion',
        ]);
    }
}
