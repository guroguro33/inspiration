<?php

use App\Idea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //データのクリア
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('ideas')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      // データの挿入
      factory(Idea::class, 40)->create();
    }
}
