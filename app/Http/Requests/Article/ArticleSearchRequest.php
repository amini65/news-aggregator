<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'per_page'=>'integer|min:1|max:100|nullable',
            'date_time'=>'date|date_format:Y-m-d H:i:s|nullable',
            'source'=>'string|nullable',
            'category'=>'string|nullable',
            'keyword'=>'string|nullable',
        ];
    }
}
