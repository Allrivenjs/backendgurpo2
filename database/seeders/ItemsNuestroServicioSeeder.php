<?php

namespace Database\Seeders;

use App\Models\items_nuestro_servicio;
use Illuminate\Database\Seeder;

class ItemsNuestroServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        items_nuestro_servicio::create([
            'title_ins'=>'Asesorías Administrativas',
            'description_ins'=>'Orientación en la aplicación de la legislación tributaria vigente, obligaciones tributarias, elaboración declaraciones tributarias de orden nacional (Iva-retenciones en la fuente, declaraciones de Renta, CREE) y municipal (ICA, Retenciones de ICA), Actualizaciones fiscales; Auditorias tributarias y trámites ante la DIAN.',
            'icon'=>'icon-local_9',
            'link_url'=>'asesoriasadministrativas'
        ]);

        items_nuestro_servicio::create([
            'title_ins'=>'Asesorías Financieras',
            'description_ins'=>'Fortalecer las políticas y procedimientos de las entidades públicas y privadas del área contable, asesorando y apoyando el registro de las operaciones financieras para que se realicen acorde con la normatividad vigente.',
            'icon'=>'icon-XjxC7N01',
            'link_url'=>'asesoriasfinancieras'
        ]);

        items_nuestro_servicio::create([
            'title_ins'=>'Carteleras Digitales',
            'description_ins'=>'Es una solución que te permite agregar un canal de comunicaciones para administrar y publicar contenidos en tiempo real.',
            'icon'=>'icon-utBlv01',
            'link_url'=>'cartelerasdigitales'
        ]);

        items_nuestro_servicio::create([
            'title_ins'=>'Creación de Empresas',
            'description_ins'=>'El éxito de un negocio, depende de su estructuración al momento de iniciar operaciones, se asesora en la elaboración de la minuta para la constitución de la sociedad o empresa, trámites ante la cámara de comercio, registro de proponentes, trámites ante la autoridad municipal y ante la DIAN.',
            'icon'=>'icon-local_3',
            'link_url'=>'creaciondeempresas'
        ]);

        items_nuestro_servicio::create([
            'title_ins'=>'Normas Internacionales NIIF',
            'description_ins'=>'Asesoría, acompañamiento y capacitación en la implementación de las NIIF, en el sector público y privado, acorde con la normatividad que regula a cada sector.',
            'icon'=>'icon-local_9',
            'link_url'=>'normas-internacionales-niif'
        ]);

        items_nuestro_servicio::create([
            'title_ins'=>'Plataforma OGMA',
            'description_ins'=>'Ogma es una plataforma de gestión del aprendizaje a distancia que facilita la transmisión de conocimiento hacia sus alumnos, con herramientas didácticas y una interfaz amigable para capacitarse en áreas relacionadas con las finanzas, la contabilidad y profesiones afines.',
            'icon'=>'icons-website',
            'link_url'=>'http://escuela.grupoasesorengestion.com'
        ]);
    }
}
