<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
  // 論理削除用の設定
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'idea_id', 'user_id', 'idea_review', 'five_rank'
  ];

  // リレーション
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function idea(){
    return $this->belongsTo('App\Idea');
  }

}
