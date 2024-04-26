<?php

namespace Modules\Rates\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $supplement_name
 */
class HotelRateUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'value' => 'required|numeric',
            'room_type_id' => 'required|exists:room_types,id',
            'board_type_id' => 'required|exists:insider_360_live.board_types,id',
            'currency_id' => 'required|exists:currencies,id',
            'room_category_id' => 'required|exists:insider_360_live.room_categories,id',
            'supplement_name' => 'nullable|string|required_with_all:supplement_type_id,supplement_value',
            'supplement_type_id' => 'nullable|numeric|required_with_all:supplement_name,supplement_value',
            'supplement_value' => 'nullable|numeric|required_with_all:supplement_name,supplement_type_id',
            'discount_name' => 'nullable|string|required_with_all:discount_type_id,discount_value',
            'discount_type_id' => 'nullable|numeric|required_with_all:discount_name,discount_value',
            'discount_value' => 'nullable|numeric|required_with_all:discount_name,discount_type_id',
        ];
    }


    public function messages(): array
    {
        return [
            'supplement_name.required_with_all' => 'Please fill All supplement fields.',
            'supplement_type_id.required_with_all' => 'Please fill All supplement fields.',
            'supplement_value.required_with_all' => 'Please fill All supplement fields.',
            'discount_name.required_with_all' => 'Please fill All discount fields.',
            'discount_type_id.required_with_all' => 'Please fill All discount fields.',
            'discount_value.required_with_all' => 'Please fill All discount fields.',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
