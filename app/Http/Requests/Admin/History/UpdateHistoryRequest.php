<?php

namespace App\Http\Requests\Admin\History;

use App\Models\History;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryRequest extends FormRequest
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
        return array_merge(History::createRule(), [
            'id' => 'required|exists:histories,id'
        ]);
    }
}
