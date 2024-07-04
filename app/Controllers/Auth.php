<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('Auth/login');
    }

    public function register(): string
    {
         return view('Auth/register');
    }

    public function reg($id = null)
    {
        $data['data'] = $id;
        return view('Auth/register', $data);
        //sample
    }
    

}
