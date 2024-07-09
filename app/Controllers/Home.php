<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\StoreModel;
use App\Models\LoginModel;
use App\Models\PayrollModel;


class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function employee(): string
    {
        $pm = new PayrollModel();
        $payrolldata['users'] = $pm->findall();
        return view('employee_table', $payrolldata);
    }

    public function addemployee(): string
    {
        return view('add_employee');
    }

    public function editemployee(): string
    {
        return view('edit_employee');
    }

    public function payroll()
    {
        helper(['form']);
        $salaryrules = [
            'id'        => 'required|min_length[4]|max_length[10]|is_unique[information.DILG_ID]',
            'fullname'  => 'required|min_length[5]|max_length[50]',
            'position'  => 'required|min_length[5]|max_length[50]',
            'salary'    => 'required|min_length[5]|max_length[10]'
        ];

        if ($this->validate($salaryrules)) {
            $session = session();
            $pm = new PayrollModel();
            $salarydata = [
                'DILG_ID'   => $this->request->getVar('id'),
                'Name'      => $this->request->getVar('fullname'),
                'Position'  => $this->request->getVar('position'),
                'Salary'    => $this->request->getVar('salary')
            ];

            $pm->save($salarydata);
            $session->setFlashdata('msg', $salarydata['Name']." information's added successfully!");
            return redirect('addemployee');

        }
        else {
            $data['validation'] = $this->validator;
            echo view('add_employee', $data);
        }
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

    public function generateFiletoPDF($id=null) {

        $pm = new PayrollModel();
        $datas = $pm->where('DILG_ID',$id)->first();
        $payroll['data'] = $datas;

        $options = new Options();
        $options->set('isRemoteEnable',true);

        $dompdf = new Dompdf($options);

        $html = view('loadpdf',$payroll);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = $datas['Name'].'sample'.date('YmdHis').'pdf';

        $dompdf->stream($filename,['Attachment'=>false]);



    }
}
