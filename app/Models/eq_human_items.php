<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eq_human_items extends Model
{
    use HasFactory;
    protected $table='eq_human_items';
    protected $fillable=['title_eq','subtitle_eq','content','pertenece_id'];


}
