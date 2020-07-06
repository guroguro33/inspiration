<?php

namespace App;

use Illuminate\Support\Facades\DB;
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
  public function Purchases(){
    return $this->hasMany('App\Purchase');
  }
  public function evaluations(){
    return $this->hasMany('App\Evaluation');
  }

  // 平均点算出
  public function avgFive_rank() {
    return $this->evaluations()
                ->selectRaw('avg(five_rank) as average, idea_id')
                ->groupBy(DB::raw('idea_id'));
  }

}
