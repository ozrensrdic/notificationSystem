<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => 'administrator', 'name' => 'Administrator']);
        Role::create(['id' => 'crew_member', 'name' => 'Crew member']);
    }
}
