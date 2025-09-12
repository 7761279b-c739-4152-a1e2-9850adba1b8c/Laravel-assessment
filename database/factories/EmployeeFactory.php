<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $company = Company::factory();
        $company = Company::all()->random(1)[0];
        $firstname = fake()->firstName();
        $lastname = fake()->lastName();
        return [
            'first_name' => $firstname,
            'last_name' => $lastname,
            'company_id' => $company->id,
            'email' => strtolower($firstname . '.' . $lastname) . '@' . explode('@', $company->email)[1],
            'phone' => null,
            'created_at' => fake()->dateTimeBetween('-1 year', now())
        ];
    }
}
