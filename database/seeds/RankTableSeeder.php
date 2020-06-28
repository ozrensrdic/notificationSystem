<?php

use Illuminate\Database\Seeder;
use App\Rank;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create(['name' => 'Captain']);
        Rank::create(['name' => 'Mate']);
        Rank::create(['name' => 'Bosun']);
        Rank::create(['name' => 'Engineer']);
    }
}
