<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $CategoryCount = Category::count();
        $CategoryFirstRow = Category::first()->id;

        $ConditionCount = Condition::count();
        $ConditionFirstRow = Condition::first()->id;

        $TypeCount = Type::count();
        $TypeFirstRow = Type::first()->id;

        return [
            "name" => $this->faker->word(),
            "category_id" => rand($CategoryFirstRow, $CategoryCount),
            "price" => rand(50, 150),
            "description" => $this->faker->sentence(),
            "condition_id" => rand($ConditionFirstRow, $ConditionCount),
            "type_id" => rand($TypeFirstRow, $TypeCount),
            "status" => "0",
            "photo" => "",
            "ownerName" => $this->faker->firstName(),
            "contactNumber" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "location" => "",
         ];
    }
}
