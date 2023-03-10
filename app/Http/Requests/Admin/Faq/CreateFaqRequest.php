<?php

namespace App\Http\Requests\Admin\Faq;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;

class CreateFaqRequest extends FormRequest
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
        return Faq::createRule();
    }
}
