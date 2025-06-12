<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'administrator',
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $this->call(CompanySeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
