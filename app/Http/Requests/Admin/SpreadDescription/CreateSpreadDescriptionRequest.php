<?php

namespace App\Http\Requests\Admin\SpreadDescription;

use App\Models\SpreadDescription;
use Illuminate\Foundation\Http\FormRequest;

class CreateSpreadDescriptionRequest extends FormRequest
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
        return SpreadDescription::createRule();
    }
}
