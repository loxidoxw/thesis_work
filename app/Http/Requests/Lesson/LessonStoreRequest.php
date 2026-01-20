<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
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
            'section_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'order' => 'required|integer',

            'file_path' => 'nullable|file|mimes:pdf,word,docx,txt',
            'file_url' => 'nullable|url',
            'task_description' => 'nullable|required_if:type,assignment|string',
            'start_date' => 'nullable|required_if:type,assignment|date',
            'deadline' => 'nullable|required_if:type,assignment|date|after_or_equal:start_date'
        ];
    }
}
