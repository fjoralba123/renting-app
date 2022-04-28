<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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


            'fullname'=>['required','min:5'],
            'email'=>['required','email'],
             'number_of_people'=>['required','integer'],
            'check_in'=>['required'],
            'check_out'=>['required'],

        //
    ];
    }
}
