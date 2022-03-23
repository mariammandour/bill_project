<?php

namespace Database\Seeders;

use App\Models\store_money;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class storemoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            [
                'name' => 'store1',
                'money_amount' => '500',
            ],
            [
                'name' => 'store2',
                'money_amount' => '600',
            ],
            [
                'name' => 'store3',
                'money_amount' => '1000',
            ],
            
            
        ];
        foreach ($stores as $key => $store) {
            store_money::create($store);
        }
    }
}
