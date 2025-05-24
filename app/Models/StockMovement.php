<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
    
    public function log() {
        return $this->hasOne(StockLog::class);
    }
}
