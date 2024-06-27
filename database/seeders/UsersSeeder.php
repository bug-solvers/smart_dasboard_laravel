<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = Admin::create([
            'name'              => $faker->name,
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);

        $demoUser2 = Admin::create([
            'name'              => $faker->name,
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);
    }
}
