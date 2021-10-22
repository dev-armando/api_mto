<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seedersArray = [];
        //call seeders
        foreach($seedersArray as $seeder) $this->call($seeder);
    }
}
