<?php

namespace App\Jobs;

use App\Models\StockLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\StockMovement;

class LogStockMovementJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    use InteractsWithQueue, Queueable, SerializesModels;

    protected StockMovement $movement;

    public function __construct(StockMovement $movement)
    {
        $this->movement = $movement;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
            StockLog::create([
                'stock_movement_id' => $this->movement->id,
                'product_id' => $this->movement->product_id,
                'warehouse_id' => $this->movement->warehouse_id,
                'quantity' => $this->movement->quantity,
                'type' => $this->movement->type,
                'logged_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
