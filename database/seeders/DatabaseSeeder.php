<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Admin;
use App\Models\Notification;
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

       $x =  Notification::create([
           'id' => 1,
           'type' => 'new',
            'notifiable_type' => Admin::class,
            'notifiable_id' => 2,
            'data' => json_encode([
                'title' => 'new notificaton',
                'body' => 'new notification from gouda'
            ])
        ]);

       dd($x);



        $this->call([
            UsersSeeder::class,
            RolesPermissionsSeeder::class,
        ]);

        \App\Models\User::factory(20)->create();

        Address::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
