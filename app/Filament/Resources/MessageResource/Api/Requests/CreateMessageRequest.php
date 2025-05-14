<?php

namespace App\Filament\Resources\MessageResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
			'sender_id' => 'required',
			'receiver_id' => 'required',
			'appointment_id' => 'required',
			'product_id' => 'required',
			'content' => 'required|string',
			'read_at' => 'required',
			'attachment' => 'required',
			'type' => 'required'
		];
    }
}
