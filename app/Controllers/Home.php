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

    public function guest(): string
    {
        $pm = new PayrollModel();
        $payrolldata['users'] = $pm->findall();
        return view('guest', $payrolldata);
    }    

    public function addemployee(): string
    {
        return view('add_employee');
    }

    public function deleteemployee($id=null) 
    {
        $session=session();
        $pm = new PayrollModel();
        $pm->where('DILG_ID', $id)->delete();
        $payrolldata['users'] = $pm->findall();
        
        $session->setFlashdata('msg', "Employee Information deleted successfully!");
        return view('employee_table', $payrolldata);
    }

    public function editemployee($id=null)
    {
        $pm = new PayrollModel();
        $datas = $pm->where('DILG_ID',$id)->first();
        $payroll['data'] = $datas;
        return view('edit_employee',$payroll);
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

    public function updatepayroll()
    {
        helper(['form']);
        $payrollrules = [
            'id'        => 'required|min_length[4]|max_length[100]',
            'fullname'  => 'required|min_length[5]|max_length[50]',
            'position'  => 'required|min_length[5]|max_length[50]',
            'salary'    => 'required|min_length[5]|max_length[50]',
            'minute'    => 'min_length[0]|max_length[50]',
            'sss'       => 'min_length[0]|max_length[50]',
            'tax'       => 'min_length[0]|max_length[50]',
            'month'     => 'min_length[0]|max_length[50]',
            'cutoff'    => 'min_length[0]|max_length[50]'
        ];

        if ($this->validate($payrollrules)) {
            $session = session();
            $pm = new PayrollModel();
            $updatedata = [
                'DILG_ID'   => $this->request->getVar('id'),
                'Name'      => $this->request->getVar('fullname'),
                'Position'  => $this->request->getVar('position'),
                'Salary'    => $this->request->getVar('salary'),
                'Minutes'   => $this->request->getVar('minute'),
                'SSS'       => $this->request->getVar('sss'),
                'Tax'       => $this->request->getVar('tax'),
                'Month'     => $this->request->getVar('month'),
                'Range'     => $this->request->getVar('cutoff')
            ];  

            $id = $updatedata['DILG_ID'];
            $pm->set($updatedata)->where('DILG_ID', $id)->update();
            $session->setFlashdata('msg', $updatedata['Name']." information's updated successfully!");
            return redirect('employee');
            
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
        $utla = round(($datas['Salary']/22/8/60),2)*$datas['Minutes'];
        $grosspay = round($datas['Salary']/2,2) - $utla;
        $tax = 0;
        $ph = $grosspay * 0.05;
        $sss = $datas['SSS'];
        if($datas['Tax']=="Yes"){
            $tax = $grosspay * 0.08;
            }
        $totalDeduc = round($utla,2) + round($tax,2) + round($ph,2) + round($sss,2);
        $netpay = round($datas['Salary']/2,2) - $totalDeduc;
            
        $payroll['data'] = [
            'DILG_ID'       => $datas['DILG_ID'],
            'Name'          => $datas['Name'],
            'Position'      => $datas['Position'],
            'Salary'        => $datas['Salary'],
            'Minutes'       => $utla,
            'SSS'           => $sss,
            'PH'            => $ph,
            'Tax'           => $tax,
            'Month'         => $datas['Month'],
            'Range'         => $datas['Range'],
            'TotalDeduc'    => $totalDeduc,
            'NetPay'        => $netpay
        ];

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
