<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Table;

session_start();

class CheckoutController extends Controller
{

    public function login_checkout(){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
            return view('pages/checkout/login_checkou',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand);
    }

    public function add_customer(Request $request){
        $data =array();
        $data['customer_name']= $request->get('customer_name');
        $data['customer_email']= $request->get('customer_email');
        $data['customer_phone']= $request->get('customer_phone');
        $data['customer_password']= md5($request->get('customer_password'));

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        \Illuminate\Support\Facades\Session::put('customer_id', $customer_id);
        \Illuminate\Support\Facades\Session::put('customer_name', $request->customer_name);
        return \redirect('/home');
    }

    public function checkout(){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
        return view('pages/checkout/show_checkout',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand);
    }

    public function save_checkout_customer(Request $request){
        $data =array();
        $data['shipping_name']= $request->get('shipping_name');
        $data['shipping_email']= $request->get('shipping_email');
        $data['shipping_phone']= $request->get('shipping_phone');
        $data['shipping_address']= $request->get('shipping_address');
        $data['shipping_note']= $request->get('shipping_note');

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        \Illuminate\Support\Facades\Session::put('shipping_id', $shipping_id);
        return \redirect('/payment');
    }

    public function payment(){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
        return view('pages/checkout/payment',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand);
    }

    public function order_place(Request $request){
        //Insert payment method
        $data =array();
        $data['payment_method']= $request->get('payment_option');
        $data['payment_status']= 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // Insert order
        $alldata =array();
        $alldata['customer_id']= Session::get('customer_id');
        $alldata['shipping_id']= Session::get('shipping_id');
        $alldata['payment_id']= $payment_id;
        $alldata['order_total']= Cart::total();
        $alldata['order_status']= 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($alldata);

        //Insert order-detail
        $content = Cart::content();
        foreach ($content as $v_content ) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_d_data);
        }

        if($data['payment_method']==1){
            echo 'Thanh toán bằng thẻ ATM';
        }else{
            Cart::destroy();
            $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
            $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
            return view('pages/checkout/handcash',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand);
        }
    }


    public function logout_checkout(){
        Session::flush();
        return \redirect('/login-checkout');
    }

    //--------------------------Đăng nhập----------------------------------

    public function login_customer(Request $request){
        $email = $request->get('email_account');
        $password = md5($request->get('password_account'));
        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return \redirect('/checkout');
        } else{
            return \redirect('/login-checkout');
        }
    }
}
