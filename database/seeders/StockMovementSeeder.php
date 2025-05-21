<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\StockMovement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::pluck('id');
        $warehouses = Warehouse::pluck('id');

          foreach (range(1, 10000) as $i) {
            StockMovement::create([
                'product_id' => $products->random(),
                'warehouse_id' => $warehouses->random(),
                'quantity' => rand(1, 50),
                'type' => rand(0, 1) ? 'in' : 'out',
                'movement_date' => now()->subDays(rand(0, 365)),
            ]);
        }
    }
}
