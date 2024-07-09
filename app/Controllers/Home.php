<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\StoreModel;
use App\Models\LoginModel;


class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function employee(): string
    {
        return view('employee_table');
    }

    public function addemployee(): string
    {
        return view('add_employee');
    }

    public function editemployee(): string
    {
        return view('edit_employee');
    }

    public function login(): string
    {
        return view('login');
    }

    public function register(): string
    {
        return view('register');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[5]|max_length[20]|is_unique[user.username]',
            'password1' => 'required|min_length[5]|max_length[20]',
            'password2' => 'matches[password1]'
        ];

        if ($this->validate($rules)) {
            $ac = new StoreModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password1'),PASSWORD_DEFAULT)
            ];

            $ac->save($data);
            return redirect('login');
        }
        else {
            $data['validation'] = $this->validator;
            echo view('/register', $data);
        }
    }

    public function generateFiletoPDF() {
        //$userModel = new UserModel();
        //$users = $userModel->findall();

        $options = new Options();
        $options->set('isRemoteEnable',true);

        $dompdf = new Dompdf($options);

        $html = view('loadpdf'/*,['users'=>$users]*/);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = /*'users'*/'sample'.date('YmdHis').'pdf';

        $dompdf->stream($filename,['Attachment'=>false]);

    }
}
