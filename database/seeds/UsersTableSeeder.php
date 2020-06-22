<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // データのクリア
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      // データの挿入
      factory(User::class, 5)->create();
    }
}
