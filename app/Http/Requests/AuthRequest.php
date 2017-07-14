<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required'
        ];
    }

    /**
     * 自定义错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'    => '邮箱不能为空.',
            'email.email'       => '邮箱格式正确.',
            'password.required' => '密码不能为空',
        ];
    }
}
