<?php

namespace App\Http\Requests\Teaching;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeachingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'read' => 'required|string|max:255',
            'notes' => 'required|string',
            'prayer_points' => 'required|string',
            'prayer' => 'nullable|string',
            'categories.*' => 'required|integer',
            'categories' => 'required', #validate if array exists

        ];
    }
}
