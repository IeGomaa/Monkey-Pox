<?php

namespace App\Http\Requests\EndUser;

use Illuminate\Foundation\Http\FormRequest;

class ApplyDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:doctors,email',
            'image' => 'required|image',
            'gender' => 'required|string|max:255',
            'highest_certificate' => 'required|string|max:255',
            'syndicate_number' => 'required|string|max:255|unique:doctors,syndicate_number',
            'town_id' => 'required|integer|exists:towns,id',
            'description' => 'required|string',
            'medical_syndicate_card' => 'required|image|mimes:png,jpg,webp,jpeg'
        ];
    }
}
