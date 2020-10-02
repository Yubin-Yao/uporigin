<?php

namespace App\Http\Backoffice\Requests\Auth;

use App\Http\Backoffice\Requests\Request;

class LoginRequest extends Request
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required_without:login|email',
            'username' => 'required_without:login',
            'login' => 'required_without:email,username',
            'password' => 'required',
        ];
    }
}