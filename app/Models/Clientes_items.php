<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes_items extends Model
{
    use HasFactory;
    protected $table='clientes_items';
    protected $fillable=['title1','img_url'];


}
