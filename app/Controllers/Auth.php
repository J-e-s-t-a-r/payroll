<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('login');
    }

    public function register(): string
    {
        return view('register');
    }

    public function logout(): string
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('msg','Destroying Session, failed!'. $session->get('user'));
        return view('login');
    }



    public function auth() {

        $session = session();
        $login = new LoginModel();
        $user = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $login->where('username',$user)->first();

        //var_dump($data);

        if ($data){
            $pass = $data['password'];
            $authenticate = password_verify($password, $pass);
            if ($authenticate):
                $session_data = [
                    'id' => $data['id'],
                    'user' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('employee');

            else:
                $session->setFlashdata('msg','Username and password didnt match');
                return redirect()->to('login');

            endif;
        }
        else {
            $session->setFlashdata('msg','Incorrect Username or password');
            return redirect()->to('login');
        }
    }

    // public function reg($id = null)
    // {
    //     $data['data'] = $id;
    //     return view('Auth/register', $data);
    //     //sample
    // }
    

}
