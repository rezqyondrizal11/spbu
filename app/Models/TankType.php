<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankType extends Model
{
    use HasFactory;
    protected $table = 'tank_type';

    protected $fillable = ['name'];
}
