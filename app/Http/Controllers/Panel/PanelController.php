<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('panel.index');
    }
}
