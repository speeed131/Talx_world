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
            'user_image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_nationality' => 'present',
            'user_learning_language' => 'present',
            'user_topic' => 'present|max:40',
            'user_introduce' => 'present|max:700',
        ];
    }

    public function messages()
    {
        return[
            'user_image.max' => "Maximum file size to upload is 1MB (1024 KB). If you are uploading a photo, try to reduce its resolution to make it under 1MB" ,
        ];
    }
}
