<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the products table
        DB::table('users')->insert([
            [
                'name' => 'User 1',
                'email' => 'user1@mailinator.com',
                'password' => md5('test123'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@mailinator.com',
                'password' => md5('test123'),
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@mailinator.com',
                'password' => md5('test123'),
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@mailinator.com',
                'password' => md5('test123'),
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@mailinator.com',
                'password' => md5('test123'),
            ],
            // Add more products as needed
        ]);
    }
}
