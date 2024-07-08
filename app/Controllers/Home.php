<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;


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
