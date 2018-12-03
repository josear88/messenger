<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jose',
            'email' => 'josearenas_88@outlook.com',
            'password' => bcrypt('jose88')
        ]);
    }
}
