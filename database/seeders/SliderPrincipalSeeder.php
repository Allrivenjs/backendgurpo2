<?php

namespace Database\Seeders;

use App\Models\help_area;
use App\Models\slider_principal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderPrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        slider_principal::create([
            "id" => 1,
            "title_slider" => "Servicios Asesorías
            Admistrativas",
            "subtitle_slider" => "Concéntrese en su core business principal",
            "link_button_slider" => "/asesoriasadministrativas",
            "created_at" => "2021-12-09 00:51:40",
            "updated_at" => null,
            'Url_image'=>''
        ]);
        slider_principal::create([
            "id" => 2,
            "title_slider" => "Servicios Asesorías
            Financieras ",
            "subtitle_slider" => "Optimización de recursos y evaluación financiera de nuestros clientes ",
            "link_button_slider" => "/asesoriasfinancieras",
            "created_at" => "2021-12-09 00:54:57",
            "updated_at" => null,
            'Url_image'=>''
        ]);

        slider_principal::create([
            "id" => 3,
            "title_slider" => "Carteleras
            Administrativas",
            "subtitle_slider" => "Canal de comunicaciones para administrar y publicar contenidos en tiempo real",
            "link_button_slider" => "/artelerasdigitales.",
            "created_at" => "2021-12-09 00:54:59",
            "updated_at" => null,
            'Url_image'=>''
        ]);
        slider_principal::create([
            "id" => 4,
            "title_slider" => "OGMA Educación
            en Línea Efectiva",
            "subtitle_slider" => "Capacitaciones en finanzas, contabilidad y profesiones afines",
            "link_button_slider" => "http://escuela.grupoasesorengestion.com/",
            "created_at" => "2021-12-09 00:55:00",
            "updated_at" => null,
            'Url_image'=>''
        ]);

        $help_area_item=array('Proveeemos asesoría inmediata, llámenos +312 831 99 15',
                                'Último plazo pago impuesto predial 2021',
                                'NUevo Cambio en la Ley de Empresas 236647');
        foreach ($help_area_item as $item) {
            help_area::create([
                'item' => $item
            ]);
        }
    }
}
