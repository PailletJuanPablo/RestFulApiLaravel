<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        for($i = 0; $i < 3;$i++){
User::create(['email'=>'fake@fake.com',
'password'=>Hash::make('algo')]);
        }
    }
}
