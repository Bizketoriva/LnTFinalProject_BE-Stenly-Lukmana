<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        User::create([
            'name' => 'admin',
            'email' => 'adminAccount@gmail.com',
            'password' => bcrypt('password'),
            'phoneNumber' => '087812345678',
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'guest',
            'email' => 'guestAccount@gmail.com',
            'password' => bcrypt('password'),
            'phoneNumber' => '082134567890'
        ]);

        Category::create([
            'name' => 'Work'
        ]);

        Category::create([
            'name' => 'Academic'
        ]);

        Category::create([
            'name' => 'Utilities'
        ]);

        Item::factory(10)->create();

    }
}
