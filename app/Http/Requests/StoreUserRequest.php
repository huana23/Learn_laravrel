<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập thông tin vào email',
            'email.email' => 'Email chưa đúng định dạng. VD : abc@gmail.com',
            'email.unique' => 'Email này đã tồn tại trong hệ thống',
            'password.required' => 'Bạn chưa nhập thông tin vào mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.string' => 'Họ tên không hợp lệ',
            'user_catalogue_id.gt' => 'Danh mục người dùng phải lớn hơn 0.',  
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu mới',
        ];
    }

}
