<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    use HasFactory;
    protected $table = 'tank';

    protected $fillable = ['name', 'number', 'desc', 'label', 'capacity', 'diameter', 'id_type', 'id_grade'];
    public function grade()
    {
        return $this->belongsTo(TankGrade::class, 'id_grade', 'id');
    }
    public function type()
    {
        return $this->belongsTo(TankType::class, 'id_type', 'id');
    }
}
