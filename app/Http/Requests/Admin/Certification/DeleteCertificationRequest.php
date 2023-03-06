<?php

namespace App\Http\Requests\Admin\Certification;

use App\Models\Certification;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCertificationRequest extends FormRequest
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
            'id' => 'required|integer|exists:certifications,id'
        ];
    }
}
