<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Item::factory(40)->create();
    //     \App\Models\Category::factory(10)->create();
    //     \App\Models\Condition::factory()->create(
    //         [
    //             "name" => "New",
    //         ]
    //     );
    //     \App\Models\Condition::factory()->create(
    //         [
    //             "name" => "Used",
    //         ]
    //     );
    //     \App\Models\Condition::factory()->create(
    //         [
    //             "name" => "Good Second Hand",
    //         ]
    //     );
    //     \App\Models\Type::factory()->create([
    //             "name" => "Sell",
    //     ]);
    //     \App\Models\Type::factory()->create([
    //             "name" => "For Buy",
    //     ]);
    //     \App\Models\Type::factory()->create([
    //             "name" => "For Exchange",
    //     ]);
      }
}
