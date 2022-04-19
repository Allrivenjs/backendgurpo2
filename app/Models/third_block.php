<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class third_block extends Model
{
    use HasFactory;
    protected $table='third_block';
    protected  $guarded = ['id', 'created_at', 'updated_at'];
}
