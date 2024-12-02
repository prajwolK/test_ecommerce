<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $category = Category::create(['name' => 'Electronics']);

        Product::create([
            'name' => 'iPhone 12',
            'description' => 'A new iPhone 12',
            'price' => 1000,
            'stock' => 50,
            'category_id' => $category->id,
        ]);

        Product::create([
            'name' => 'Samsung TV',
            'description' => 'A new Samsung TV',
            'price' => 2000,
            'stock' => 20,
            'category_id' => $category->id,
        ]);

        
    }
}
