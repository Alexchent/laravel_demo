<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        return View('home');
    }

    public function help()
    {

    }

    public function about()
    {

    }
}
