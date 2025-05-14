<?php

namespace App\Filament\Resources\OrderResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
			'order_number' => 'required',
			'status' => 'required',
			'payment_method' => 'required',
			'payment_status' => 'required',
			'payment_id' => 'required',
			'address_id' => 'required',
			'shipping_method' => 'required',
			'shipping_cost' => 'required|numeric',
			'subtotal' => 'required|numeric',
			'tax' => 'required|numeric',
			'total' => 'required|numeric',
			'notes' => 'required|string'
		];
    }
}
