<?php

namespace App\Http\Requests\Admin\Certification;

use App\Models\Certification;
use Illuminate\Foundation\Http\FormRequest;

class CreateCertificationRequest extends FormRequest
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
            'certificate' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'date' => 'required|date',
            'doctor_id' => 'required|integer|exists:doctors,id'
        ];
    }
}
