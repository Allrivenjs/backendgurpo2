<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quienes_somos extends Model
{
    use HasFactory;
    protected $table='quienes_somos';
    protected $fillable=['title1','title2','title3','sub_title','sub_title2',
                         'content1', 'img_url_fondo','img_url'];
}
