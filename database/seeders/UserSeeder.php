<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name' => 'Alexander',
                'email' => 'a.guzman@itglobalproject.com',
                'username'=>'alex',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'David',
                'email' => 'd.gonzalez@itglobalproject.com',
                'username'=>'david',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'jose',
                'email' => 'j.espinosa@itglobalproject.com',
                'username'=>'jose',
                'password' => bcrypt('12345678'),  
            ]
        ];
        DB::table('users')->insert($data);
    }
}
