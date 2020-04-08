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
//        alert('Hello World!')->persistent("Close this");
        return view('panel.index');

    }
}
