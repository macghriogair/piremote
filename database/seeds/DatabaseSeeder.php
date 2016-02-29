<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fromJson = json_decode(file_get_contents(database_path().'/plugs.json'), true);
        DB::table('plugs')->insert($fromJson);
    }
}
