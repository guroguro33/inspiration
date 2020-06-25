<?php

use App\Like;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
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
    DB::table('likes')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // データの挿入
    factory(Like::class, 10)->create();
  }
}
