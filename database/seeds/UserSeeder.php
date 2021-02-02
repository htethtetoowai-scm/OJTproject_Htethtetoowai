<?php

namespace database\seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
   /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' =>  Hash::make('test'),
            'profile'=>'public\Image\userProfile\20210127040733.png',
            'type' => '',
            'phone' => '98837747',
            'address' => 'Hledan, Yangon',
            'dob' => now(),
            'created_at'=>now(),
            'updated_at'=>now(),
         
            

        ]);
    }
}