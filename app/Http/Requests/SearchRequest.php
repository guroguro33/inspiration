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
        'low' => 'nullable|integer|min:1',
        'hight' => 'nullable|integer|min:1',
        'day' => 'nullable|integer|between:1,2',
        'title' => 'nullable|string|max:255',
    ];
  }
}
