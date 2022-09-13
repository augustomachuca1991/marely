<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Augusto Machuca',
            'email' => 'augusto_fer22@hotmail.com',
            'password' =>  bcrypt('12345678'),
        ]);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
