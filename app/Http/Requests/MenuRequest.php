<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required',
            'category' => 'required',
            'shop' => 'required',
            'price' => 'required',
            'desc' => ['required', 'max:100'],
            'img' => ['required', 'image', 'mimes:png,jpg,jpeg,webp']
        ];
    }

    public function messages(): array
    {
        return [
            'img.required' => 'Wajib Menambahkan Gambar',
            'img.mimes' => 'Gambar harus berupa jpg, png, jpeg, webp',
            'desc.max' => 'Deskripsi maksimal 30 char'
        ];
    }

    protected function prepareForValidation(): array
    {
        return [
            'name' => trim($this->name),
            'price' => trim($this->price),
            'desc' => trim($this->desc),
        ];
    }
}
