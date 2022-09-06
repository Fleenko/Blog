<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required_without:generate_new_password',
            'role' => 'required|integer',
            'generate_new_password' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'email.required' => 'Это поле необходимо заполнить',
            'email.email' => 'E-mail должна быть похожа на настоящий адрес электронной почты. Например: username@site.ru',
            'email.unique' => 'Это e-mail уже используется',
            'password.required_without' => 'Это поле необходимо заполнить',
            'role.required' => 'Выберите роль',
        ];
    }
}
