<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ControllerSetting extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'name_site'        => 'required|min:5|max:35',
            'email'            => 'required|email',
            'phone'            => 'required|numeric',
            'meta_keywords'    => 'required',
            'address'           => 'required',
            'meta_description' => 'required',
            'brief_site'       => 'required',
            'avatar'           => 'image|mimes:jpeg,bmp,png',
            'favicone'         => 'image|mimes:jpeg,bmp,png',
        ];
    }
}
