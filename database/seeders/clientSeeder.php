<?php

namespace Database\Seeders;

use App\Models\client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'Mohamed Ahmed',
                'Phone' => '+880-31-000-000',
            ],
            [
                'name' => 'Ahmed Mohamed',
                'Phone' => '+880-31-000-000',
            ],
            [
                'name' => 'Mohamed Amr',
                'Phone' => '+880-31-000-000',
            ],
            
            
        ];
        foreach ($clients as $key => $client) {
            client::create($client);
        }
    }
}
