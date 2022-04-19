<?php

namespace Database\Seeders;

use App\Models\second_block;
use Illuminate\Database\Seeder;

class SecondBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        second_block::create([
                "id"=> 1,
                "title_sb"=> "Consultoría Tributaria y Contable",
                "subtitle_sb"=> "Contribuimos al desarrollo sostenido de las empresas",
                "content_sb"=> 'GRUPO ASESOR EN GESTION S.A.S, es una empresa que nació en el año 2004 con el objeto de Asesorar y apoyar las entidades públicas y privadas en todos los aspectos financieros, administrativos y contables.<br>            <br>          Contamos con más de 14 años de experiencia, contribuyendo al desarrollo estratégico integral de la de Entidades Territoriales, Empresas Industriales y Comerciales, de economía mixta y solidaria, a través de  la prestación de servicios de Asesorías Financieras y Administrativas, Consultarías, Auditorias e Interventorías, en la Administración del Régimen Subsidiado en Salud, Control Interno, lo cual incluye la Capacitación y Formación de manera permanente, oportuna y pertinente en busca del crecimiento  de sus clientes.',
                'url'=>'',
                "created_at"=> "2021-12-09 01:00:30",
                "updated_at"=> null
        ]);
    }
}
