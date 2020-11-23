<?php

namespace Database\Seeders;

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

        \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name'=>'Master',
            'email' => 'admin@gmail.com',
            'gender'=>1,
            'role_id'=>1,
            'password' => \Hash::make('admin@gmail.com')
        ]);
    }
}
