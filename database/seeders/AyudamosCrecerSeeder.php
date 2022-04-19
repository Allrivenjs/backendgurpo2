<?php

namespace Database\Seeders;

use App\Models\ayudamos_crecer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AyudamosCrecerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ayudamos_crecer::create([
            'title_ac'=>'Áyudamos a su Empresa Crecer',
            'description_ac'=>'Ayudamos a transformar empresas que quieren aprovechar el talento de sus empleados para crecer y ser más competitivas generando compromiso en sus empleados, potenciando su talento y mejorando el clima laboral.'
        ]);
        $email=DB::table('business_hours')->insert([
            'time_open_and_close'=>'Lun - Vie: 8 am - 5 pm / Sab: 8am - 12m'
        ]);
    }
}
