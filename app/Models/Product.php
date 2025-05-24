<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //$protected =$guard[];
    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }
}
