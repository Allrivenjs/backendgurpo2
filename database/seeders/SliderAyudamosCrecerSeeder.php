<?php

namespace Database\Seeders;

use App\Models\ayudamos_crecer;
use App\Models\Slider_ayudamos_crecer;
use Illuminate\Database\Seeder;

class SliderAyudamosCrecerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Slider_ayudamos_crecer::create([
                'estrellas'=>'5',
                'author'=>'Jorge Salinas'.+ 1,
                'profession'=>'Ingeniero Eléctrico',
                'comment'=>'“Contentos de tener nuestra empresa en las mejores manos.”',
                'ayudC_id'=> 1
            ]);


    }
}
