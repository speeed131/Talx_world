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
            // 'image_url' => 'required',
            'user_nationality' => 'required',
            'user_learning_language' => 'required',
            'user_topic' => 'required',
            'user_introduce' => 'required',
            'user_id' => '',
            'email' => '',

        ];
    }
}
