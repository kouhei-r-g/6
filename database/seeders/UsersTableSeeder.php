<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'User3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
