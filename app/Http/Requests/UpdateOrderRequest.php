<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            
            'order_address'=>'required|max:255',
            'order_phone'=>'required|max:55',
            'order_status'=>'integer',
            'payment_status'=>'integer',
            'payment_method'=>'integer'
        ];
    }
}
