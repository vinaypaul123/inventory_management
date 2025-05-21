<?php

namespace App\Repositories;

interface InventoryRepositoryInterface
{
    public function getInventoryReport(?int $productId = null, ?int $warehouseId = null): array;

    public function storeStockMovement(array $data): \App\Models\StockMovement;
}