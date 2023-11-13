<?php

namespace App\Http\Requests\Admin\Movie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|file',
            'year' => 'nullable|integer',
            'director_id' => 'required|integer|exists:directors,id',
            'actor_ids' => 'nullable|array',
            'actor_ids.*' => 'nullable|integer|exists:actors,id',
            'genre_ids' => 'nullable|array',
            'genre_ids.*' => 'nullable|integer|exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'this input is empty',
            'title.string' => 'data must be a string',
            'description.required' => 'this input is empty',
            'description.string' => 'data must be a string',
            'image.required' => 'this input is empty',
            'image.file' => 'choose the file',
            'director_id.required' => 'this input is empty',
            'director_id.integer' => 'data must be a number',
            'director_id.exists' => 'data is not find',
            'actor_ids.array' => 'data type must be an array',
            'genre_ids.array' => 'data type must be an array',


        ];
    }
}
