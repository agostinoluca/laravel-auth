<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|string|max:100|unique:projects,title',
            'type_id' => 'nullable|exists:types,id',
            'description' => 'required|string',
            'screenshot_site' => 'nullable|image|max:1000',
            'client_name' => 'nullable|string|max:100',
            'budget' => 'nullable|numeric',
            'url' => 'nullable|url',
        ];
    }
}
