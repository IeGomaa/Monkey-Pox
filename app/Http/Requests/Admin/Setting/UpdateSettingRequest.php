<?php

namespace App\Http\Requests\Admin\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'id' => 'required|integer|exists:settings,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'string' => 'required_if:type,string|string|max:255',
            'image' => 'required_if:type,image|image|mimes:png,jpg,webp,jpeg'
        ];
    }
}
