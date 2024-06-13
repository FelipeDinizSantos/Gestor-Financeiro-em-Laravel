<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecurringExpenseRequest extends FormRequest
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
            'user-id' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:255',
            'amount' => 'required|numeric|min:1|max:99999999.99',
            'recurrence' => 'required|in:daily,weekly,monthly,yearly',
            'start-date' => 'required|date',
            'end-date' => 'required|date',
        ];
    }
}
