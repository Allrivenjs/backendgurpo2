<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nuestro_servicio extends Model
{
    use HasFactory;
    protected $table='nuestro_servicio';
    protected $fillable=['title_ns', 'subtitle_ns'];
}
