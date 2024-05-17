<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function faq()
    {
        return view('faq');
    }

    public function winners()
    {
        return view('winners');
    }

    public function afterForm()
    {
        return view('client.dashboard.dashboard-afterForm');
    }

    public function dashPenyisihanOlim()
    {
        return view('client.lomba.olim.dash-penyisihan-olim');
    }

    public function dashPenyisihanUiUx()
    {
        return view('client.lomba.ui-ux.dash-penyisihan-uiux');
    }

    public function attempt()
    {
        return view('client.lomba.olim.attempt');
    }

    public function attempt_essay()
    {
        return view('client.lomba.olim.attempt-essay');
    }
}
