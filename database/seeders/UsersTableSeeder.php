<?php

use App\Moduls\User;
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
        User::truncate();
        $password = Hash::make('nopass');
        User::create([
            'name' => 'admin',
            'email' => 'e@mail.com',
            'password' => $password
        ]);
    }
}
