<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items_nuestro_servicio extends Model
{
    use HasFactory;
    protected $table='items_nuestro_servicio';
    protected $fillable=['title_ins','description_ins','icon'];
}
