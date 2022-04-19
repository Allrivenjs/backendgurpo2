<?php

namespace Database\Seeders;

use App\Models\third_block;
use Illuminate\Database\Seeder;

class ThirdBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        third_block::create([
            "id"=> 1,
            "title_tb"=> "Consultoría Tributaria y Contable",
            "subtitle_tb"=> "Experiencia desde 2004",
            "content_tb"=> "Contribuimos al desarrollo sostenido de las empresas, trabajamos con modelos de dirección enfocados que permiten compartir el conocimiento y la experiencia para abrir espacios generadores de valor, ayudando a la construcción de empresas económicamente exitosas y socialmente sanas.",
            "created_at"=> "2021-12-09 01:57:03",
            "updated_at"=> null
        ]);
    }
}
