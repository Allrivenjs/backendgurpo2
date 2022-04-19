<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{
    use HasFactory;
    protected $table='contactos';
    protected $fillable=['title1','img_url_fondo','dirrecion','numerotelefono1','numerotelefono2','correo_electronico','link_facebook','link_twitter','link_instagram'];
}
