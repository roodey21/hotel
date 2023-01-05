<?php

namespace Database\Seeders;

use App\Models\PriceType;
use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'weekday', 'weekend', 'peak season'
        ];
        foreach ($data as $d) {
            PriceType::create([
                'name' => $d,
                'status' => 'active'
            ]);
        }
    }
}
