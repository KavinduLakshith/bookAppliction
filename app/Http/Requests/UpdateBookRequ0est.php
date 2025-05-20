<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequ0est extends FormRequest
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
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'publicationYear' => 'required|string|max:20',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
