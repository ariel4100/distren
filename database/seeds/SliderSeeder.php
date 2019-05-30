<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'section' => 'home',
            'image' => 'uploads/sliders/O8EecPHRpsP0r9Fo84CwREsSwOyO6VDYaHxWnjxI.png',
            'order' => 'aa',
        ]);
        DB::table('sliders')->insert([
            'section' => 'empresa',
            'image' => 'uploads/sliders/wNUqvSQ5194jBmWSxDV70IYhllLuwsg9g5MmvStr.png',
            'order' => 'aa',
        ]);
    }
}
