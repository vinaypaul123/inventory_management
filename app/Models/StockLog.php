<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function stockMovement() {
        return $this->belongsTo(StockMovement::class);
    }
}
