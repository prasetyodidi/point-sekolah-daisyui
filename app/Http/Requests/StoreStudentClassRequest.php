<?php

namespace App\Http\Requests;

use App\Models\StudentClass;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('store', StudentClass::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'class_name' => 'required',
            'homeroom_teacher' => 'required'
        ];
    }
}
