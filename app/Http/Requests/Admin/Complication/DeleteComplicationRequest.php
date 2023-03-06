<?php

namespace App\Http\Requests\Admin\Complication;

use App\Models\Complication;
use Illuminate\Foundation\Http\FormRequest;

class DeleteComplicationRequest extends FormRequest
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
            'id' => 'required|integer|exists:complications,id'
        ];
    }
}
