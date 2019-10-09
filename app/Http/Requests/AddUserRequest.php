<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required|max:30',
            'email' => 'required',
            'role_id' => 'required',
            'active' => 'required',
            'password' => 'required|max:15|min:6',
            'password_re' => 'same:password'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザー名',
            'email' =>'メールアドレス',
            'role_id' => '管理者権限',
            'active' => '会員属性',
            'password' => 'パスワード',
            'password_re' => 'パスワード(再入力)',
        ];
    }
}
