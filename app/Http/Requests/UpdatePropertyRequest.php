<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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


            'name'=>['required','min:5'],
            'description'=>['required','min:5'],
            'address'=>['required' ,'min:5'],
            'type'=>['required','min:5'],
            'price'=>['required','numeric'],
            'area'=>['required','numeric'],
            'image'=>['required','file','image','max:10000'],
            'startDate'=>['required','required'],
            'endDate'=>['required','required'],

        //
    ];
    }
}
