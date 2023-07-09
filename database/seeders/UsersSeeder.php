<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData()
    {
        return [
            [
                "name" => 'Администратор',
                "email" => 'admin@admin.ru',
                "login" => 'admin',
                "password" => Hash::make('12345'),
                "is_admin" => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "name" => 'Пользователь',
                "email" => 'user@google.com',
                "login" => 'user',
                "password" => Hash::make('12345'),
                "is_admin" => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                "name" => 'Учитель',
                "email" => 'teacher@ya.ru',
                "login" => 'teacher',
                "password" => Hash::make('12345'),
                "is_admin" => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "name" => 'Учитель-фронт',
                "email" => 'teacher-front@ya.ru',
                "login" => 'teacher-front',
                "password" => Hash::make('12345'),
                "is_admin" => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                "name" => 'Учитель-бэк',
                "email" => 'teacher-back@ya.ru',
                "login" => 'teacher-back',
                "password" => Hash::make('12345'),
                "is_admin" => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
    }
}
