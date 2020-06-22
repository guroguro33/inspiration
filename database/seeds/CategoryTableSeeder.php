<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
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
      DB::table('categories')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      // データの挿入
      DB::table('categories')->insert([
        'category_name' => 'マッチング',
      ]);
      DB::table('categories')->insert([
        'category_name' => '掲示板',
      ]);
      DB::table('categories')->insert([
        'category_name' => 'SNS',
      ]);
      DB::table('categories')->insert([
        'category_name' => 'シェアリング',
      ]);
      DB::table('categories')->insert([
        'category_name' => 'ECサイト',
      ]);
      DB::table('categories')->insert([
        'category_name' => '情報配信',
      ]);
      DB::table('categories')->insert([
        'category_name' => 'その他',
      ]);
    }
}
