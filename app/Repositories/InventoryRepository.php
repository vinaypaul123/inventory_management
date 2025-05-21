<?php

namespace App\Repositories;

use App\Models\StockMovement;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Events\StockMovementCreated;
use App\Jobs\LogStockMovementJob;


class InventoryRepository implements InventoryRepositoryInterface
{
    public function getInventoryReport(?int $productId = null, ?int $warehouseId = null): array
    {
        $cacheKey = 'inventory_report_' . ($productId ?? 'all') . '_' . ($warehouseId ?? 'all');

        return Cache::remember($cacheKey, 300, function () use ($productId, $warehouseId) {
            $query = StockMovement::with(['product', 'warehouse'])
            ->selectRaw('product_id, warehouse_id, SUM(CASE WHEN type = "in" THEN quantity ELSE -quantity END) as stock')
            ->groupBy('product_id', 'warehouse_id');

            if ($productId) {
                $query->where('product_id', $productId);
            }

            if ($warehouseId) {
                $query->where('warehouse_id', $warehouseId);
            }

            return $query->get()->toArray();
        });
    }

    public function storeStockMovement(array $data): StockMovement
    {
        return DB::transaction(function () use ($data) {
            $movement = StockMovement::create($data);

            // Fire event to invalidate cache
            event(new StockMovementCreated($movement));

            // Dispatch log job
            LogStockMovementJob::dispatch($movement);

            return $movement;
        });
    }
}
