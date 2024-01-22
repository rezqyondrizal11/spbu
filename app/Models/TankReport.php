<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankReport extends Model
{
    use HasFactory;
    protected $table = 'tank_report';

    protected $fillable = ['id_tank', 'kapasitas_awal', 'kapasitas_stok', 'created_by'];
    public function tank()
    {
        return $this->belongsTo(Tank::class, 'id_tank', 'id');
    }

    public function getTankNameAttribute()
    {
        return $this->tank->name;
    }
}
