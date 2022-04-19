<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descargas extends Model
{
    use HasFactory;
    protected $table='descargas';
    protected $fillable=['title1','title2','sub_title','img_url_fondo'];
}
