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

  // リレーション
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function category(){
    return $this->belongsTo('App\Category');
  }
  public function likes(){
    return $this->hasMany('App\Like');
  }
  public function evaluations(){
    return $this->hasMany('App\Evaluation');
  }
}
