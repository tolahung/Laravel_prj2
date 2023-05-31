<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{


    public function view_account()
    {
        $tbl_category = DB::table('tbl_category')->where('category_status', '1')->get();
        $tbl_brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        $users = DB::table('users')->limit(1)->get();

        if (Auth::check()) {
            if (Auth::user()->adminCheck == 0) {
                return view('pages/account', ['tbl_category' => $tbl_category])->with('brand', $tbl_brand)->with('user_info', $users);
            } else {
                return redirect('/home');
            }
        }

    }

    public function get_account_logout()
    {
        Auth::logout();
//        \Illuminate\Support\Facades\Session::put('admin_name',null);
//        \Illuminate\Support\Facades\Session::put('admin_id', null);
        return redirect('/home');
    }
}
