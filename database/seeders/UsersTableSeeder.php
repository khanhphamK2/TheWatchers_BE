<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Dear Admin',
            'email' => 'admin@email.com',
            'role' => ROLE_ADMIN,
            'password' => Hash::make('admin@123'),
        ]);
    }
}
