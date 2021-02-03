<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use database\seeds\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserSeeder::class);
        Model::reguard();
    }
}