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
        $admin->password = Hash::make('123123');
        $admin->address = 'Công ty CP Codegym Việt Nam';
        $admin->phone = '0123456789';
        $admin->role = 'admin';
        $admin->save();
    }


}
