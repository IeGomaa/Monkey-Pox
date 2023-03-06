<?php

namespace App\Http\Requests\Admin\Symptom;

use App\Models\Prevention;
use App\Models\Symptom;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSymptomRequest extends FormRequest
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
        return array_merge(Symptom::createRule(), [
            'id' => 'required|integer|exists:symptoms,id'
        ]);
    }
}
