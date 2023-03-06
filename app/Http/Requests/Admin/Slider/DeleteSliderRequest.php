<?php

namespace App\Http\Requests\Admin\Slider;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class DeleteSliderRequest extends FormRequest
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
            'id' => 'required|integer|exists:sliders,id'
        ];
    }
}
