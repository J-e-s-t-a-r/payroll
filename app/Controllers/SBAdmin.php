<?php

namespace App\Controllers;

class SBAdmin extends BaseController
{
    public function index(): string
    {
        return view('SB Admin Template/index');
    }

    public function error401(): int
    {
        return view('SB Admin Template/401');
    }

    public function error404(): string
    {
        return view('SB Admin Template/404');
    }

    public function error500(): string
    {
        return view('SB Admin Template/500');
    }

    public function charts(): string
    {
        return view('SB Admin Template/charts');
    }

    public function layout1(): string
    {
        return view('SB Admin Template/layout-sidenav-light');
    }

    public function layout2(): string
    {
        return view('SB Admin Template/layout-static');
    }

    public function tables(): string
    {
        return view('SB Admin Template/tables');
    }

    public function login(): string
    {
        return view('SB Admin Template/login');
    }

    public function password(): string
    {
        return view('SB Admin Template/password');
    }

    public function register(): string
    {
        return view('SB Admin Template/register');
    }
    

}
