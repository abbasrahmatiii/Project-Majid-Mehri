<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //

    public function index()
    {

        return view('admin.index');
    }


    public function general()
    {
        return view('admin.settings.general');
    }
}
