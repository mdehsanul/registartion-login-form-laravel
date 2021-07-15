<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    function getDatafromRefistrationform()
    {
        return view('registrationform');
    }

    function getDatafromLoginform()
    {
        return view('loginform');
    }
}
