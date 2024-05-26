<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            // 'title' => 'required|string|max:100|unique:projects,title,except,' . $this->project->id,
            'title' => ['required', 'string', 'max:100', Rule::unique('projects')->ignore($this->project->id)],
            'description' => 'required|string',
            'screenshot_site' => 'nullable|image|max:1000',
            'client_name' => 'nullable|string|max:100',
            'budget' => 'nullable|numeric',
            'url' => 'nullable|url',
        ];
    }
}
