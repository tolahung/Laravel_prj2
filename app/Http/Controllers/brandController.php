<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class brandController extends Controller
{
    public function add_brand_product(){
        return view ('admins/add_brand');
    }

    public function save_add_brand_product(Request $request){
        $data = array();
        $data['brand_name'] = $request->get('brand_product_name');
        $data['brand_des'] = $request->get('brand_product_des');
        $data['brand_status'] = $request->get('brand_product_status');

        DB::table('tbl_brand')->insert($data);
        \Illuminate\Support\Facades\Session::put('message', 'Them thanh cong');
        return redirect('/all-brand-product');
    }

    public function all_brand_product(){
        $all_brand = DB::table('tbl_brand')->get();
        return view ('admins/all_brand', ['tbl_brand'=>$all_brand]);
    }

    public function save_all_brand_product(){
    }

    public function unactive_brand_product($id){
        DB::table('tbl_brand')->where('brand_id', $id)->update(['brand_status'=>1]);
        return \redirect('/all-brand-product');
    }

    public function active_brand_product($id){
        DB::table('tbl_brand')->where('brand_id', $id)->update(['brand_status'=>0]);
        return \redirect('/all-brand-product');
    }

    public function edit_brand_product(Request $request){
        $tbl_brand = DB::table('tbl_brand')->where('brand_id', $request->brand_id)->get();
        return view ('admins/edit_brand', ['tbl_brand'=>$tbl_brand]);
//        echo $tbl_category;
    }

    public function save_edit_brand_product(Request $request){
        DB::table('tbl_brand')->where('brand_id',$request->brand_id)->update(['brand_name'=>$request->edit_brand_product_name]);
        return \redirect('/all-brand-product');
    }


    public function delete_brand_product($id){
        DB::table('tbl_brand')->where('brand_id',$id)->delete();
        \Illuminate\Support\Facades\Session::put('mess',' Xoa thanh cong');
        return \redirect('/all-brand-product');
    }

//-------------------------------- PHAN XU LY TRANG CHU -----------------------------------------------//

    public function show_brand_home($brand_id){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
        $brand_byid = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_brand.brand_id',$brand_id)->get();
        return view('pages/category/show_brand',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand)->with('byid',$brand_byid);
    }
}

