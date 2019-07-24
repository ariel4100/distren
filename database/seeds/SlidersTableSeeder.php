<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => NULL,
                'subtitle' => NULL,
                'image' => 'uploads/sliders/O8EecPHRpsP0r9Fo84CwREsSwOyO6VDYaHxWnjxI.png',
                'section' => 'home',
                'order' => 'aa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => NULL,
                'subtitle' => NULL,
                'image' => 'uploads/sliders/wNUqvSQ5194jBmWSxDV70IYhllLuwsg9g5MmvStr.png',
                'section' => 'empresa',
                'order' => 'aa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}