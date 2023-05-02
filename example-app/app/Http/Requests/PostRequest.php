<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Error: CATEGORY-required',
            'title.required' => 'Error: TITLE-required',
            'text.required' => 'Error: TEXT-required',
            'category_id.string' => 'Error CATEGORY not string',
            'title.string' => 'Error TITLE not string',
            'text.string' => 'Error TEXT not string',
            'category_id.exist' => 'Error CATEGORY not exist',
        ];
    }
}
