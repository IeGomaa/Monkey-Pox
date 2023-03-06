<?php

namespace App\Http\Requests\Admin\Clinic;

use App\Models\Clinic;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicRequest extends FormRequest
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
        return array_merge(Clinic::createRule(), [
            'id' => 'required|integer|exists:clinics,id'
        ]);
    }
}
