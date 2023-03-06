<?php

namespace App\Http\Requests\Admin\Symptom;

use App\Models\Prevention;
use App\Models\Symptom;
use Illuminate\Foundation\Http\FormRequest;

class CreateSymptomRequest extends FormRequest
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
        return Symptom::createRule();
    }
}
