<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginasShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Pagina principal
        //Equipo humano seccion

        Schema::create('team_human', function (Blueprint $table) {
            $table->id();
            $table->text('title_team');
            $table->text('subtitle_team');

            $table->text('url1');
            $table->timestamps();
        });
        Schema::create('eq_human_items', function (Blueprint $table) {
            $table->id();
            $table->text('title_eq');
            $table->text('subtitle_eq')->nullable();
            $table->longText('content');

            $table->unsignedBigInteger('pertenece_id');

            $table->timestamps();
        });



        //slider principal y sus imagenes
        Schema::create('slider_principal', function (Blueprint $table) { //ya
            $table->id();
            $table->text('title_slider');
            $table->text('subtitle_slider');
            $table->text('link_button_slider');
            $table->text('Url_image');

            $table->timestamps();
        });


        //segundo bloque de la pagina 'consultoria'
        Schema::create('second_block', function (Blueprint $table) { //ya
            $table->id();
            $table->text('title_sb');
            $table->text('subtitle_sb');
            $table->longText('content_sb');
            $table->text('url');
            $table->timestamps();
        });


        //tercer bloque de la pagina 'consultoria + items'

        Schema::create('third_block', function (Blueprint $table) { //ya
            $table->id();
            $table->text('title_tb');
            $table->text('subtitle_tb');
            $table->longText('content_tb');
            $table->timestamps();
        });


        //nuestro servicios
        Schema::create('nuestro_servicio', function (Blueprint $table) { //
            $table->id();
            $table->text('title_ns');
            $table->text('subtitle_ns');

            $table->timestamps();
        });

        // parte del slider, sesion ayuda
        Schema::create('items_nuestro_servicio', function (Blueprint $table) {
            $table->id();
            $table->text('title_ins');
            $table->text('description_ins');
            $table->text('link_url');
            $table->text('icon');
            $table->timestamps();
        });


        //Ayudamos a crecer
        Schema::create('ayudamos_crecer', function (Blueprint $table) { //ya
            $table->id();
            $table->text('title_ac');
            $table->text('description_ac');
            $table->timestamps();
        });
        Schema::create('Slider_ayudamos_crecer', function (Blueprint $table) {//ya
            $table->id();
            $table->integer('estrellas');
            $table->text('author');
            $table->text('profession');
            $table->text('comment');

            $table->unsignedBigInteger('ayudC_id');

            $table->foreign('ayudC_id')
                ->references('id')
                ->on('ayudamos_crecer')
                ->onDelete('cascade');
            $table->timestamps();
        });

        // Other pages ///
        // Generalizando //
        // las paginas se manejan por un titulo de pagina, un titulo de contenido y un subtitulo del mismo
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->text('titulo2');
            $table->text('titulo3')->nullable();
            $table->text('sub_titulo')->nullable();
            $table->text('img_url_2')->nullable();
            $table->text('img_url')->nullable();
            $table->timestamps();
        });
        // ahora procedemos a distribuir por bloques el contenido expuesto
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->text('img_url')->nullable();

            $table->unsignedBigInteger('paginas_id');

            $table->foreign('paginas_id')
                ->references('id')
                ->on('paginas')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('items_carteleras', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->text('title');
            $table->timestamps();
        });

//pagina quienes somos
        Schema::create('quienes_somos', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('title2');
            $table->text('title3');
            $table->text('sub_title');
            $table->text('sub_title2');
            $table->longText('content1')->nullable();
            $table->text('img_url_fondo');
            $table->text('img_url');
            $table->timestamps();
        });
//pagina clientes
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('title2');
            $table->text('sub_title');
            $table->longText('content')->nullable();
            $table->text('img_url_fondo');
            $table->timestamps();
        });

        Schema::create('clientes_items', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('img_url');
            $table->timestamps();
        });
        //pagina de descargas
        Schema::create('descargas', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('title2');
            $table->text('sub_title');
            $table->text('img_url_fondo');
            $table->timestamps();
        });

        Schema::create('descargas_items', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('description');
            $table->text('url_archivo');

            $table->timestamps();

        });

        //Contactenos
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->text('title1');
            $table->text('img_url_fondo');
            $table->text('dirrecion');
            $table->text('numerotelefono1')->nullable();
            $table->text('numerotelefono2')->nullable();
            $table->text('correo_electronico')->nullable();
            $table->text('link_facebook')->nullable();
            $table->text('link_twitter')->nullable();
            $table->text('link_instagram')->nullable();
            $table->timestamps();
        });

        // help_area
        Schema::create('help_area', function (Blueprint $table) {
            $table->id();
            $table->text('item');
            $table->timestamps();
        });

        //Emails
        Schema::create('emails',function (Blueprint $table){
            $table->id();
            $table->text('correo_from');
            $table->text('correo_to')->nullable();
            $table->text('name');
            $table->text('asunto');
            $table->text('ciudad')->nullable();
            $table->text('body');
            $table->timestamps();
        });
        Schema::create('email_own',function (Blueprint $table){
            $table->id();
            $table->text('email');
            $table->timestamps();
        });

        //Fechas de cierra y apertura
        Schema::create('business_hours',function (Blueprint $table){
            $table->id();
            $table->text('time_open_and_close');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas_shows');
    }
}
