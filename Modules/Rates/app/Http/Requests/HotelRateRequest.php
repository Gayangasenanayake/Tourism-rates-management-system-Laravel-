<?php

namespace Modules\Rates\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $start_date
 * @property mixed $end_date
 */
class HotelRateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'value' => 'required|numeric',
            'hotel_id' => 'required|exists:insider_360_live.hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'board_type_id' => 'required|exists:insider_360_live.board_types,id',
            'agent_id' => 'required|exists:insider_360_live.agents,id',
            'room_category_id' => 'required|exists:insider_360_live.room_categories,id',
            'currency_id' => 'required|exists:currencies,id',
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
