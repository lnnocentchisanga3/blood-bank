<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->has('logged_in')) {
            return redirect()->to(base_url().'/dashboard');
        }
        
        $data['title'] = "ZNBTS";
        $data['brand'] = "Blood Bank Database";
        return view('home', $data);
    }
}
