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
        $close = env('CLOSED', '');

        $rules = [
            'billing_method' => ['required'],
            'pickup_time' => [
                'required',
                'after:' . $now,
            ]
        ];

        if ($close != null) {
            $rules['pickup_time'][] = 'before:' . $close;
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages =  [
            'billing_method.required' => 'Perlu memilih metode pembayaran',
            'pickup_time.required' => 'Perlu mengisi jam pengambilan',
            'pickup_time.after' => 'Tidak boleh kurang dari waktu saat ini',
        ];

        if (env('CLOSED', '') != null) {
            $messages['pickup_time.before'] = 'Format waktu lebih dari jam tutup kantin';
        }

        return $messages;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'billing_method' => strtolower($this->billing_method)
        ]);
    }


}
