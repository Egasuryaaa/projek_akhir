<?php

namespace App\Filament\Resources\SellerLocationResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerLocationRequest extends FormRequest
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
			'business_name' => 'required',
			'description' => 'required|string',
			'address_line' => 'required|string',
			'province' => 'required',
			'city' => 'required',
			'district' => 'required',
			'postal_code' => 'required',
			'latitude' => 'required|numeric',
			'longitude' => 'required|numeric',
			'is_active' => 'required',
			'business_hours' => 'required',
			'contact_phone' => 'required',
			'photos' => 'required',
			'seller_type' => 'required'
		];
    }
}
