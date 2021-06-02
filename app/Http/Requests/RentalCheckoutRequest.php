<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentalCheckoutRequest extends FormRequest
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
            "customer_id"       =>  'required|exists:customers,id',
            "vehicle_id"        =>  'required|exists:vehicles,id',
            "vehicle_checkout"  =>  'required|date',
            "vehicle_initial_condition"     =>  'required|string',
            "rental_status"     =>  'required|in:rented',
        ];
    }
}
