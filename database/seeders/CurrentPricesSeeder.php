<?php

namespace Database\Seeders;

use App\Models\CurrentPrice;
use Illuminate\Database\Seeder;

class CurrentPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [13860428, 54456119, 13264003, 12954218];

        foreach($ids as $id) {
            CurrentPrice::factory()->create(['product_id' => $id]);
        }
    }
}
