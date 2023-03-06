<?php

namespace App\Http\Requests\Admin\SpreadItem;

use App\Models\SpreadItem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpreadItemRequest extends FormRequest
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
        return array_merge(SpreadItem::createRule(), [
            'id' => 'required|integer|exists:spread_items,id'
        ]);
    }
}
