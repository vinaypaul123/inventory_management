<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockMovementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'product_id'    => $this->product_id,
            'warehouse_id'  => $this->warehouse_id,
            'quantity'      => $this->quantity,
            'type'          => $this->type,
            'movement_date' => $this->movement_date,
        ];
    }
}
