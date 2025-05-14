<?php

namespace App\Filament\Resources\AddressResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
			'user_id' => 'required',
			'label' => 'required',
			'recipient_name' => 'required',
			'phone' => 'required',
			'address_line' => 'required|string',
			'province' => 'required',
			'city' => 'required',
			'district' => 'required',
			'postal_code' => 'required',
			'is_default' => 'required',
			'longitude' => 'required|numeric',
			'latitude' => 'required|numeric',
			'notes' => 'required|string'
		];
    }
}
