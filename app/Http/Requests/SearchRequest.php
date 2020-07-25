<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        'category' => 'nullable|integer|between:1,7',
        'low' => 'nullable|min:1|max:100000000|integer',
        'high' => 'nullable|min:1|max:100000000|integer',
        'day' => 'nullable|integer|between:1,2',
        'title' => 'nullable|string|max:255',
    ];
  }

  // エラーメッセージ
  public function messages()
  {
    return [
      'category.integer' => 'カテゴリーに不正な入力がありました',
      'category.between' => 'カテゴリーに不正な入力がありました',
      'day.integer' => '出品日付に不正な入力がありました',
      'day.between' => '出品日付に不正な入力がありました'
    ];
  }
}
