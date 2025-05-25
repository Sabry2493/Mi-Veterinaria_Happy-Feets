<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
       // return view('welcome_message'); //vista por defecto al instalar codeigniter
        return view('menu');
    }


}

