<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'id' => ('2'),
            'name' => ('admin'),
            'email' => ('a@gmail.com'),
            'password' => Hash::make('123'),
        ]);
    }
}