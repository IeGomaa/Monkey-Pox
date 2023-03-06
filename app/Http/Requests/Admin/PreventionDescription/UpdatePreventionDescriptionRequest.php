<?php

namespace App\Http\Requests\Admin\PreventionDescription;

use App\Models\PreventionDescription;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePreventionDescriptionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return array_merge(PreventionDescription::createRule(), [
            'id' => 'required|integer|exists:prevention_descriptions,id'
        ]);
    }
}
