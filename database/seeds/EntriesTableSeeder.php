<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\Entry::class, 100)->create();
    }
}
