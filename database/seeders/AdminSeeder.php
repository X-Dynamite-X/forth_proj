<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user =  User::create([
            'name' => 'dynamite',
            'email' => 'dynamite@gmail.com',
            'email_verified_at' => now(),
            'password' => '123',

        ]);
        $user->assignRole('writer','admin');


        // $user ->getRoleNames('writer','admin');

    }
}
