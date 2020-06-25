<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
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
      'idea_title' => 'required|string|max:255',
      'idea_description' => 'required|string|max:2000',
      'idea_detail' => 'required|string|max:4000',
      'idea_price' => 'required|integer|min:1',
    ];
  }
}
