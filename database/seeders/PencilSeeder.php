<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pencil;

class PencilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pencils = [
            [
            'brand' => 'Faber-Castell',
            'color' => 'Black',
            'description' => 'HB Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'brand' => 'Joyko',
            'color' => 'Black',
            'description' => '2B Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'brand' => 'Staedtler',
            'color' => 'Black',
            'description' => '2B Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'brand' => 'Big',
            'color' => 'Black',
            'description' => '2B Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'brand' => 'Kenko',
            'color' => 'Black',
            'description' => '2B Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'brand' => 'Agatis',
            'color' => 'Black',
            'description' => '2B Pencil',
            'stock' => 10,
            'price' => 5.5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ];

        Pencil::insert($pencils);
    }
}
