<?php

namespace App\Http\Requests\Admin\Diagnosis;

use App\Models\Diagnosis;
use Illuminate\Foundation\Http\FormRequest;

class DeleteDiagnosisRequest extends FormRequest
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
            'id' => 'required|integer|exists:diagnoses,id'
        ];
    }
}
