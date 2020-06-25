<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'category_name'
  ];

  // リレーション
  public function ideas(){
    return $this->hasMany('App\Idea');
  }
}
