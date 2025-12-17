<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email'   => 'waheedimtiaz7@test.com',
                'name'    => 'Waheed',
                'balance' => '50000.00000000',
            ],
            [
                'email'   => 'abdulrehman@test.com',
                'name'    => 'Abdul Rehman',
                'balance' => '0.00000000',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name'     => $userData['name'],
                    'password' => Hash::make('123456'),
                    'balance'  => $userData['balance'],
                ]
            );
        }
    }
}
