<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'author.required' => 'Mandatory field',
          'content.required' => 'Mandatory field',
        ];
    }
}
