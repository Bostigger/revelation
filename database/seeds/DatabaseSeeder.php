<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NomineesTableSeeder::class);

        //$path = 'public/kt_residents.sql';
        //DB::unprepared(file_get_contents($path));
        //$this->command->info('Kt_residents table seeded!');
        //$this->call(KtResidentsTableSeeder::class);
    }
}
