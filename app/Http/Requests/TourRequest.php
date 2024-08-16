<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'title' => 'required|max:255',
            'price' => 'required',
            'promotion' => 'required|lt:price',
            'day' => 'required|numeric',
            'attributes' => 'required|array',
            'attributes.*' => 'required|numeric|exists:attributes,id',
            'type_id' => 'required|exists:tour_types,id',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'ward_id' => 'required|exists:wards,id',
            'is_active'=>'nullable',
            'description' => 'required',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'hotels'=>'required',
            'hotels.*' => 'required|numeric|exists:hotels,id',
        ];
    }
}
