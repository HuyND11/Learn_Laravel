<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturer;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = ['description', 'model', 'image', 'produced_on', 'manufacturer_id'];
    function manufacturer () {
       return $this->beLongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }
}
