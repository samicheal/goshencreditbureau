<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Emmanuel',
            'email' => 'obi@gmail.com',
            'password' => bcrypt('emmanuel'),
            'admin' => 2
        ]);
    }
}
