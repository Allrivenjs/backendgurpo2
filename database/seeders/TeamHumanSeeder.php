<?php

namespace Database\Seeders;

use App\Models\eq_human_items;

use App\Models\team_human;
use Illuminate\Database\Seeder;

class TeamHumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index=team_human::create([
            'title_team'=>'Equipo Humano',
            'subtitle_team'=>'¿Porqué Elegirnos?',
            'url1'=>'assets/images/equipo-humano-GAG.jpg',
        ]);

        $itmes_human1 = eq_human_items::create([
            'title_eq'=>'Área Financiera',
            'subtitle_eq'=>'Personal Especializado',
            'content'=>"
                <ul>
                  <li>Contadora Pública: Especializada en Gestión Pública y Finanzas Públicas, Diplomados en NIIF y Sistemas de Gestión de la Calidad.</li>
                  <li>Contador Público: Especialista en Revisoría Fiscal.</li>
                  <li>Contador Público: Con estudios en normas internacionales de contabilidad.</li>
                  <li>Abogado: Tecnólogos en Contabilidad Sistematizada.</li>
                  <li>Administrador Público Municipal y Regional.</li>
                  <li>Ingeniero de Sistemas.</li>
                </ul>
            ",
            'pertenece_id'=>$index->id
        ]);



        $itmes_human2 = eq_human_items::create([
            'title_eq'=>'Área Administrativa',
            'subtitle_eq'=>'Personal Capacitado',
            'content'=>"
                <ul>
                  <li>Abogado, Especializado en Derecho Administrativo</li>
                  <li>Administradora Documental</li>
                  <li>Administrador Público Municipal y Regional</li>
                  <li>Psicóloga Social Comunitaria, Especializada en psicología organizacional</li>
                </ul>
            ",
            'pertenece_id'=>$index->id
        ]);


        $itmes_human3 = eq_human_items::create([
            'title_eq'=>'Asistencia Técnica',
            'subtitle_eq'=>'Personal Calificado',
            'content'=>"
                <ul>
                  <li>Asistencia técnica en sistemas</li>
                  <li>Capacitación</li>
                  <li>Mantenimiento y asistencia técnica a equipos de cómputo, incluyendo el avalúo comercial y bajo las normas NIIF</li>
                  <li>Realización de avalúos a los bienes Muebles e inmuebles</li>
                  <li>Realización de inventarios estableciendo numeración y paqueteo.</li>
                </ul>
            ",
            'pertenece_id'=>$index->id
        ]);




    }
}
