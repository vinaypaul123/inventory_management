<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this['product_id'],
            'warehouse_id' => $this['warehouse_id'],
            'stock' => (int) $this['stock'],
            'product_name' => $this['product_name'] ,
            'warehouse_name' => $this['warehouse_name'] ,
        ];
    }
}
