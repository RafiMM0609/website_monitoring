<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        return view('pages/index');
    }
    public function about()
    {
        return view('pages/about');
    }
    public function chart()
    {
        return view('pages/chartjs');
    }
}
