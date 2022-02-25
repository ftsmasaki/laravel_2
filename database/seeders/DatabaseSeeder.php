<?php

namespace Database\Seeders;

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
         // BooksTableSeederを読み込むように指定
         //$this->call(BooksTableSeeder::class);

         //LicensesTaableSeederを読み込むように指定
         $this->call(LicensesTableSeeder::class);
    }
}
