<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UserRequest extends FormRequest
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
            'user_image' => 'required|file|image',
            'user_nationality' => 'required',
            'user_learning_language' => 'required',
            'user_topic' => 'required|max:120',
            'user_introduce' => 'required|max:500',
            'user_id' => '',
            'email' => '',

        ];
    }
}
