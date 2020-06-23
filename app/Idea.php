<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
  // 論理削除使用の設定
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'user_id', 'category_id', 'idea_title', 'idea_description', 'idea_detail', 'idea_price'
  ];
}
