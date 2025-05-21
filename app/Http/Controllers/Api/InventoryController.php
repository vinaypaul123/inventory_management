<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\InventoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\InventoryReportResource;
use App\Http\Requests\StoreStockMovementRequest;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\StockMovementResource;

class InventoryController extends Controller
{
    protected InventoryRepositoryInterface $inventoryRepo;

    public function __construct(InventoryRepositoryInterface $inventoryRepo)
    {
        $this->inventoryRepo = $inventoryRepo;
    }

    public function report(ReportRequest $request)
    {

        $data = $request->validated();

         $report = $this->inventoryRepo->getInventoryReport(
            $data['product_id'] ?? null,
            $data['warehouse_id'] ?? null
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
            'data' => new StockMovementResource($movement),
        ], 201);
    }
}

