<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users,email, '.$this->id.'',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',

        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập thông tin vào email',
            'email.email' => 'Email chưa đúng định dạng. VD : abc@gmail.com',
            'email.unique' => 'Email này đã tồn tại trong hệ thống',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.string' => 'Họ tên không hợp lệ',
            'user_catalogue_id.gt' => 'Danh mục người dùng phải lớn hơn 0.',  

        ];
    }
}
