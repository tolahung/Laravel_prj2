<?php

namespace App\Http\Controllers;

use Hamcrest\BaseDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class categoryProductController extends Controller
{
    public function add_category_product(){
       return view ('admins/add_category');
    }

    public function all_category_product(){
        $all_category = DB::table('tbl_category')->get();
        return view ('admins/all_category', ['tbl_category'=>$all_category]);
    }

    public function save_add_category_product(Request $request){
       $data = array();
       $data['category_name'] = $request->get('category_product_name');
        $data['category_des'] = $request->get('category_product_des');
        $data['category_status'] = $request->get('category_product_status');

         DB::table('tbl_category')->insert($data);
         \Illuminate\Support\Facades\Session::put('message', 'Them thanh cong');
         return redirect('/add-category-product');
    }

    public function save_all_category_product(){

    }

    public function unactive_category_product($id){
         DB::table('tbl_category')->where('category_id', $id)->update(['category_status'=>1]);
         return \redirect('/all-category-product');
    }

    public function active_category_product($id){
        DB::table('tbl_category')->where('category_id', $id)->update(['category_status'=>0]);
        return \redirect('/all-category-product');
    }

    public function edit_category_product(Request $request){
        $tbl_category= DB::table('tbl_category')->where('category_id', $request->id)->get();
        return view ('admins/edit_category', ['tbl_category'=>$tbl_category]);
//        echo $tbl_category;
    }

    public function save_edit_category_product(Request $request){
           DB::table('tbl_category')->where('category_id', $request->id)->update(['category_name'=>$request->edit_category_product_name]);
        return \redirect('/all-category-product');
    }


    public function delete_category_product($id){
         DB::table('tbl_category')->delete($id);
         \Illuminate\Support\Facades\Session::put('mess' ,' Xoa thanh cong');
         return \redirect('/all-category-product');
    }


//    -----------------end function adminpage-------------------------

    public function show_category_home($category_id){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
//        $cate_name = DB::table('tbl_category')->where('tbl_category.category_id',$category_id)->limit(1)->get();
        $cate_byid = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')->where('tbl_category.category_id',$category_id)-> get();
         return view('pages/category/show_brand',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand)->with('byid',$cate_byid);
    }



}
