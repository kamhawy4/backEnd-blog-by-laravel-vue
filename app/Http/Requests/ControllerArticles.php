<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControllerArticles extends FormRequest
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
            'title'            => 'required|min:5|max:35|unique:articles',
            'description'      => 'required',
            'type'             => 'required',
            'photo'            => 'required|image|mimes:jpeg,bmp,png',
        ];
    }
}
