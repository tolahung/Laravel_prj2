<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{

    public function index(){
        return view ('admin_login');
    }

    public function view_register(){
        return view('admin_register');
    }

    public function save_register(Request $request){
        $name = $request->admin_name;
        $email = $request->admin_email;
        $pass = $request -> admin_password;
        $add = $request -> admin_address;

        DB::table('users')->insert([
            'name'=>$name, 'email'=>$email, 'password'=>bcrypt($pass),'address'=>$add, 'adminCheck'=>0,
        ]);
        return \redirect('/admin-login');
    }

    public function get_login(Request $request){
        $email_Login = $request->admin_email;
        $pass_login =$request->admin_password;

        $tbl_category = DB::table('tbl_category')->where('category_status', '1')->get();
        $tbl_brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        $users = DB::table('users')->where('email', $email_Login)->limit(1)->get();

//        $user = DB::table('users')->where('email',$email_Login)->where('password', $pass_login)->get();

        if (Auth::attempt(['email'=>$email_Login, 'password'=>$pass_login])){
            if (Auth::user()-> adminCheck==1){
                return \redirect('/dashboard');
            }
            else{
                \Illuminate\Support\Facades\Session::put('name', 'đăng ký thành công ');
                return view('pages/account', ['tbl_category' => $tbl_category])->with('brand', $tbl_brand)->with('user_info', $users);
            }
        }
        else{
            echo 'loi roi';
        }

    }

    public function get_logout(){
        \Illuminate\Support\Facades\Session::put('admin_name',null);
        \Illuminate\Support\Facades\Session::put('admin_id', null);
        return redirect('/admin-login');
    }
}
