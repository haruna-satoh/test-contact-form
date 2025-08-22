<?php

namespace App\Http\Requests;

use Laravel\Fortify\Http\Requests\LoginRequest as BaseLoginRequest;

class FortifyLoginRequest extends BaseLoginRequest
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
            $rules = parent::rules();

            $rules['email'] = ['required', 'string', 'email'];

            return $rules;
    }

    public function messages()
    {
        return[
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => 'メールアドレスは「ユーザ名 @ ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.string' => 'パスワードを文字列で入力してください',
        ];
    }
}
