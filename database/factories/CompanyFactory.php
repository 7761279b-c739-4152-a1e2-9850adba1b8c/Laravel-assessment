<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        while(strlen($name) > 15)  {
            $name = fake()->company();
        }
        // $name = fake()->text(10);
        $name_an = preg_replace("/[^a-z0-9]/", "", strtolower($name));
        return [
            'name' => $name,
            'email' => 'contact@' . $name_an . '.example',
            'logo_filepath' => null,
            'website' => 'https://' . $name_an . '.example',
            'created_at' => fake()->dateTimeBetween('-1 year', now())
        ];
    }
}
