<?php

use App\Evaluation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationsTableSeeder extends Seeder
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
    DB::table('evaluations')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // データの挿入
    factory(Evaluation::class, 100)->create();
  }
}
