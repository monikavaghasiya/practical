<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        /*echo "<pre>";
        print_r($this->all());
        exit;*/
//        $this->sanitize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'email' => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
//            'password' => 'required|string|min:6|max:30',
//            'confirm_password' => 'required_with:password|string|same:password|min:6',
            'profile_pic.*' => ['image', 'mimes:jpeg,png,jpg'],
//            'about' => 'required|string',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['about'] = htmlspecialchars($input['about']);

        $this->replace($input);
    }
}
