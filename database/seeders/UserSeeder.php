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
        $admin->password = Hash::make('admin');
        $admin->address = 'Công ty CP Codegym Việt Nam';
        $admin->phone = '0123456789';
        $admin->role = 'admin';
        $admin->save();

        $user = new User();
        $user->name = 'Đoàn Quân';
        $user->email = 'NE.qkvt@gmail.com';
        $user->password = Hash::make('123123');
        $user->address = 'Công ty CP Codegym Việt Nam';
        $user->phone = '0822222298';
        $user->role = 'user';
        $user->save();
    }


}
