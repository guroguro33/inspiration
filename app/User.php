<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  //論理削除使用の設定 
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'user_introduce', 'user_img', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  // リレーション
  public function likes(){
    return $this->hasMany('App\Like');
  }
  public function ideas(){
    return $this->hasMany('App\Idea');
  }
  public function evaluations(){
    return $this->hasMany('App\Evaluation');
  }
}
