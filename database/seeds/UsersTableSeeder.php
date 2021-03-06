<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Amitav Roy',
            'email' =>  'amitav.roy@focalworks.in',
            'password' => bcrypt('password'),
        ]);
    }
}
