<?php

namespace App\Http\Requests\Donor;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DonorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'district' => 'required',
            'image' => 'required|image',
            'city' => 'required',
            'ph_number' => 'required|min:10|max:10',
            'b_group' => 'required',
            'birth' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18),
            'd_date' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subMonth(3),
        ];
    }
    public function messages()
    {
        return [
            'birth.before' => 'You must be 18 years old',
            'd_date.before' => 'You must wait 3 month before next donation'
        ];
    }

}
