<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items_carteleras extends Model
{
    use HasFactory;
    protected $table='items_carteleras';
    protected $fillable=['content', 'title'];
}
