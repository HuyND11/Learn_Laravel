<?php

namespace App\Models;
use App\Models\Car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $fillable = ['name'];
    public function cars() {
        return $this->hasMany(Car::class, 'manufacturer_id', 'id');
    }
}
