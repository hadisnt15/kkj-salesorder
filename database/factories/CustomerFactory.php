<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;
    public function definition(): array
    {
        return [
            'CstCode' => fake()->regexify('B0-0[0-9]{6}'),
            'CstName' => fake()->company(),
            'CstAddress' => fake()->address(),
            // 'news_author' => fake()->name(),
            'CstState' => fake()->state(),
            'CstCity' => fake()->city(),
            'CstPerson' => fake()->name(),
            'CstPhoneNum' => fake()->phoneNumber(),
            'CstTermin' => 60,
            'CstLimit' => 10000000
        ];
    }
}
