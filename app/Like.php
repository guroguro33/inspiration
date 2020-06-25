<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'user_id', 'idea_id'
  ];

  // リレーション
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function idea(){
    return $this->belongsTo('App\Idea');
  }
}
