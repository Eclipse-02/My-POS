<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $this->call(LaratrustSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Udin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ])->attachRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'Amel',
            'username' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('87654321'),
        ])->attachRole('kasir');
    }
}
