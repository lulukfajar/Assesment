<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Cumi Goreng',
                'category' => 1,
                'harga' => 20000,
                'gambar' => 'cumi.jpg',
                'is_deleted' => false,
            ],
            [
                'name' => 'Sayur Lodeh',
                'category' => 2,
                'harga' => 15000,
                'gambar' => 'sayur.jpg',
                'is_deleted' => false,
            ],
            [
                'name' => 'Ikan Bakar',
                'category' => 3,
                'harga' => 25000,
                'gambar' => 'ikan.jpg',
                'is_deleted' => false,
            ],
            [
                'name' => 'Es Teh',
                'category' => 4,
                'harga' => 5000,
                'gambar' => 'esteh.jpg',
                'is_deleted' => false,
            ],
            [
                'name' => 'Happy Hour Juice',
                'category' => 5,
                'harga' => 8000,
                'gambar' => 'happy_hour.jpg',
                'is_deleted' => false,
            ],
            [
                'name' => 'Kerang Saos Tiram',
                'category' => 1,
                'harga' => 18000,
                'gambar' => 'kerang.jpg',
                'is_deleted' => false,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
