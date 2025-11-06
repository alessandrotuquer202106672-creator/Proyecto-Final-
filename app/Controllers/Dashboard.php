<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function admin()
    {
        return view('dashboard_admin');
    }

    public function supervisor()
    {
        return view('dashboard_supervisor');
    }

    public function operador()
    {
        return view('dashboard_operador');
    }
}
