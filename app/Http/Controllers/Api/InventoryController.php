<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\InventoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\InventoryReportResource;
use App\Http\Requests\StoreStockMovementRequest;

class InventoryController extends Controller
{
    protected InventoryRepositoryInterface $inventoryRepo;

    public function __construct(InventoryRepositoryInterface $inventoryRepo)
    {
        $this->inventoryRepo = $inventoryRepo;
    }

    public function report(Request $request)
    {
         
        $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'warehouse_id' => 'nullable|exists:warehouses,id',
        ]);

        $report = $this->inventoryRepo->getInventoryReport(
            $request->product_id,
            $request->warehouse_id
        );
        
        return response()->json([
            'success' => true,
            'data' => InventoryReportResource::collection($report),
        ]);
    }

    public function storeStockMovement(StoreStockMovementRequest $request)
    {
        $movement = $this->inventoryRepo->storeStockMovement($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Stock movement recorded successfully',
            'data' => $movement
        ], 201);
    }
}

