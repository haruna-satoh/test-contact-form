<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|string|email',
            'tel1' => 'required|digits_between:2,5',
            'tel2' => 'required|digits:4',
            'tel3' => 'required|digits:4',
            'address' => 'required|string',
            'building' => 'nullable|string',
            'category_id' => 'required',
            'detail' => 'required|max:120'
        ];
    }

    public function messages ()
    {
        return [
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1.digits_between:2,5' => '電話番号を2~5桁の数字で入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2.digits:4' => '電話番号を4桁の数字で入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel3.digits:4' => '電話番号を4桁の数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'building.string' => '建物名を文字列で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max:120' => 'お問い合わせ内容は120文字以内で入力してください'
        ];
    }
}
