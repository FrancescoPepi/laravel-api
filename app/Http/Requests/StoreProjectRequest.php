<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "name" => ["required", "string"],
            "category_id" => ["nullable", "exists:categories,id"],
            "description" => [],
            "slug" => [],
            'tags' => ['nullable', 'exists:tags,id'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nome del progetto obbligatorio",
            "name.string" => "Nome del progetto deve essere una stringa",
            'tags.exists' => 'I tag inseriti non sono validi',
            "category_id.exists" => "La categoria inserita non è valida",
        ];
    }
}