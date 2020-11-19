<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoundStore extends FormRequest
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
            'name'=>"required|min:0|max:100|unique:rounds",
            'location'=>"required|min:0|max:255",
            "suggest"=>"required|min:0",
            'time'=>"required|min:0|max:1000",
        ];
    }
}
