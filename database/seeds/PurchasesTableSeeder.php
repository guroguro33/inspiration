<?php

use App\Purchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasesTableSeeder extends Seeder
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
    DB::table('purchases')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // データの挿入
    factory(Purchase::class, 40)->create();
  }
}
