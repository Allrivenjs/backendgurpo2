<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $table='clientes';
    protected $fillable=['title1','title2','sub_title','content','img_url_fondo'];

}
