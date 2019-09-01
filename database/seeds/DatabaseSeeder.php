<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Type;
use App\Models\Card;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Users
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'alex',
                'email' => 'alex@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'redac',               
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'serg',
                'email' => 'serg@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'helen',
                'email' => 'helen@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 
        
        // Types
        Type::create(
            [
                'type' => 'deposit',
            ]
        );
        Type::create(
            [
                'type' => 'debit',
            ]
        );           
        Type::create(
            [
                'type' => 'credit',
            ]
        );
        Type::create(
            [
                'type' => 'credit-USD',
            ]
        ); 
        Type::create(
            [
                'type' => 'credit-EUR',
            ]
        );          

        // Cards
        Card::create(
            [
                'user_id' => 3, 
                'number' => '1333 3333 3333 3333', 
                'type_id' => 1, 
                'active' => 1,
            ]
        ); 
        Card::create(
            [
                'user_id' => 3, 
                'number' => '2333 3333 3333 3333', 
                'type_id' => 2, 
                'active' => 1,
            ]
        ); 
        Card::create(
            [
                'user_id' => 4, 
                'number' => '1444 4444 4444 4444', 
                'type_id' => 1, 
                'active' => 1,
            ]
        );         
        Card::create(
            [
                'user_id' => 4, 
                'number' => '2444 4444 4444 4444', 
                'type_id' => 2, 
                'active' => 1,
            ]
        ); 
        Card::create(
            [
                'user_id' => 4, 
                'number' => '3444 4444 4444 4444', 
                'type_id' => 3, 
                'active' => 1,
            ]
        );             
    }
}
