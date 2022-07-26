<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new UserModel();
        $user1->name = 'Cardo Dalisay';
        $user1->email = 'test@gmail.com';
        $user1->password = Hash::make('12345678');
        $user1->user_personal_information_id = 1;
        $user1->role_id = 1;
        $user1->save();
    }
}
