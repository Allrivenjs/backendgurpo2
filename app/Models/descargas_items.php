<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descargas_items extends Model
{
    use HasFactory;
    protected $table='descargas_items';
    protected $fillable=['title1','description','url_archivo'];
}
