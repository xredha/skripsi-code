<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'npm', 'description' => 'net profit margin', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'roa', 'description' => 'return of assets', 'type' => 'benefit', 'bobot' => 9],
            ['name' => 'roe', 'description' => 'return of equity', 'type' => 'benefit', 'bobot' => 9],
            ['name' => 'eps', 'description' => 'earning per share', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'per', 'description' => 'price earning ration', 'type' => 'cost', 'bobot' => 3],
            ['name' => 'der', 'description' => 'debt to equity ration', 'type' => 'cost', 'bobot' => 6],
            ['name' => 'pbv', 'description' => 'price to book value', 'type' => 'cost', 'bobot' => 6],
        ];

        foreach ($data as $key=>$item) {
            Kriteria::create([
                'code' => $key + 1,
                'name' => $item['name'],
                'description' => $item['description'],
                'type' => $item['type'],
                'bobot' => $item['bobot'],
            ]);
        }
    }
}
