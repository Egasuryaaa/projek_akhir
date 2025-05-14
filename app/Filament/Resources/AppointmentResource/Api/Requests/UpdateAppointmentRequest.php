<?php

namespace App\Filament\Resources\AppointmentResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'seller_id' => 'required',
			'buyer_id' => 'required',
			'seller_location_id' => 'required',
			'appointment_date' => 'required|date',
			'appointment_time' => 'required',
			'status' => 'required',
			'purpose' => 'required',
			'notes' => 'required|string'
		];
    }
}
