<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class PanelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
//        SweetAlert::message('سلام به سایت ما خوش اومدین !');
        alert()->success('You have been logged out.', 'Good bye!');
        return view('panel.index');

    }
}
