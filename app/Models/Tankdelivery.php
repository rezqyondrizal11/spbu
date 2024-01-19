<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tankdelivery extends Model
{
    use HasFactory;
    protected $table = 'tank_delivery';

    protected $fillable = ['do_volume', 'id_tank', 'id_don', 'driver', 'vehicle_number', 'id_supplier', 'id_supply', 'created_by'];
    public function tank()
    {
        return $this->belongsTo(Tank::class, 'id_tank', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }
    public function supply()
    {
        return $this->belongsTo(Supply::class, 'id_supply', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
