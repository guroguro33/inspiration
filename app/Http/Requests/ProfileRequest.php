<?php

namespace App\Http\Requests;

use App\Rules\CheckCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'user_introduce' => 'nullable|string|max:2000',
      'user_img' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:3072',
      'email' => 'required|email',
      'new_password' => 'nullable|string|min:8|max:255|confirmed',
    ];
  }
}
