<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CheckoutRequest extends FormRequest
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
        $now = Carbon::now()->format('H:i');
        $close = '16:00';

        return [
            'billing_method' => ['required', 'not_in:null'],
            'pickup_time' => [
                'required',
                'after:' . $now,
                'before:' . $close
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'billing_method.not_in' => 'Perlu memilih metode pembayaran',
            'pickup_time.required' => 'Perlu mengisi jam pengambilan',
            'pickup_time.after' => 'Format waktu tidak valid',
            'pickup_time.before' => 'Format waktu lebih dari jam tutup kantin'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'billing_method' => strtolower($this->billing_method)
        ]);
    }


}
