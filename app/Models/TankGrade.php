<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankGrade extends Model
{
    use HasFactory;
    protected $table = 'tank_grade';

    protected $fillable = ['name', 'harga'];
}
