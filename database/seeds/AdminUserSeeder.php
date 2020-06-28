<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrator',
            'surname' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt(123),
            'role_id' => 'administrator',
            'email_verified_at' => now()
        ]);
    }
}
