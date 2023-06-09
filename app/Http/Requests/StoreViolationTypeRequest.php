<?php

namespace App\Http\Requests;

use App\Models\ViolationType;
use Illuminate\Foundation\Http\FormRequest;

class StoreViolationTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', ViolationType::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'violation_type_name' => 'required'
        ];
    }
}
