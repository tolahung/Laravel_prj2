<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function show_dashboard(){
        return view('admins/dashboard');
    }


}
