<?php

namespace Database\Seeders;

use App\Models\item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'item1',
                'quantity' => '100',
                'cost_price'=>'50',
                'sale_price'=>'60'
            ],
            [
                'name' => 'item2',
                'quantity' => '120',
                'cost_price'=>'50',
                'sale_price'=>'60'
            ],
            [
                'name' => 'item3',
                'quantity' => '500',
                'cost_price'=>'50',
                'sale_price'=>'60'
            ],
            [
                'name' => 'item4',
                'quantity' => '500',
                'cost_price'=>'50',
                'sale_price'=>'60'
            ],
            
            
        ];
        foreach ($items as $key => $item) {
            item::create($item);
        }
    }
}
