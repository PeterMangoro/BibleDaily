<?php

namespace App\Http\Requests\Reading;

use Illuminate\Foundation\Http\FormRequest;

class CreateReadingRequest extends FormRequest
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
            'read' => 'required|string|max:255',
            'notes' => 'required|string',
            'prayer_points' => 'required|string',
            'prayer' => 'nullable|string',
        ];
    }
}
