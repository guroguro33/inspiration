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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(IdeasTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(EvaluationsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
    }
}
