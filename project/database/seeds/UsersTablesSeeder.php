<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'            =>  'admin',
            'email'           =>  'admin@gmail.com',
            'password'        =>  Hash::make('password'),
            'remember_token'  =>  Str::random(10),
            'role'            =>  'admin'
        ]);
        User::create([
            'name'            =>  'duong',
            'email'           =>  'duong@gmail.com',
            'password'        =>  Hash::make('duong123'),
            'remember_token'  =>  Str::random(10),
            'role'            =>  'user'
        ]);
        User::create([
            'name'            =>  'abc',
            'email'           =>  'abc@gmail.com',
            'password'        =>  Hash::make('abc12345'),
            'remember_token'  =>  Str::random(10),
            'role'            => 'user'
        ]);
        User::create([
            'name'            =>  'ad',
            'email'           =>  'ad@gmail.com',
            'password'        =>  Hash::make('password'),
            'remember_token'  =>  Str::random(10),
            'role'            =>  'admin'
        ]);
    }
}
