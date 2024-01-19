<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class SalesReport extends Model
{
    use HasFactory;
    protected $table = 'sales_report';

    protected $fillable = ['id_tank_report', 'jam_awal', 'jam_akhir', 'created_by', 'kapasitas', 'harga'];
    public function tankreport()
    {
        return $this->belongsTo(TankReport::class, 'id_tank_report', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
