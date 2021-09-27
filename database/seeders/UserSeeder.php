<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->avatar = 'd8e9d047c460820bfab094817f0a5834.jpg';
        $admin->password = Hash::make('123123');
        $admin->address = 'Công ty CP Codegym Việt Nam';
        $admin->phone = '0123456789';
        $admin->role = 'admin';
        $admin->save();
    }


}
