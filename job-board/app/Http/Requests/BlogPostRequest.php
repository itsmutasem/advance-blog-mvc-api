<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:post',
            'author' => 'required',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Mandatory field',
            'author.required' => 'Mandatory field',
            'body.required' => 'Mandatory field'
        ];
    }
}
