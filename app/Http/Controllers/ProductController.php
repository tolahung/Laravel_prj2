<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Table;

session_start();


class ProductController extends Controller
{
    public function add_product(){
//       $all_product = DB::table('tbl_product')->get();
        $tbl_category =DB::table('tbl_category')->get();
        $tbl_brand =DB::table('tbl_brand')->get();
        return view ('admins/add_product',['tbl_category'=>$tbl_category],['tbl_brand'=>$tbl_brand]);
    }

    public function save_add_product(Request $request){
        $data = array();
        $data['product_name'] = $request->get('product_name');
        $data['product_des'] = $request->get('product_des');
        $data['product_status'] = $request->get('product_status');
        $data['product_price'] = $request->get('product_price');
        $data['product_content'] = $request->get('product_content');
        $data['category_id'] = $request->get('category_status');
        $data['brand_id'] = $request->get('brand_status');

        DB::table('tbl_product')->insert($data);
        \Illuminate\Support\Facades\Session::put('message', 'Them thanh cong');
        return redirect('/add-product');
    }


    public function all_product(){
        $tbl_product = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->get();
        return view ('admins/all_product', ['tbl_product'=>$tbl_product]);
    }

    public function unactive_product($id){
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>1]);
        return \redirect('/all-product');
        }

    public function active_product($id){
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>0]);
        return \redirect('/all-product');
    }

    public function edit_product(Request $request){
        $tbl_product= DB::table('tbl_prodduct')->where('prodduct_id', $request->id)->get();
        return view ('admins/edit_category', ['tbl_category'=>$tbl_product]);
//        echo $tbl_category;
    }

    public function save_edit_product(Request $request){
        DB::table('tbl_category')->where('category_id', $request->id)->update(['category_name'=>$request->edit_category_product_name]);
        return \redirect('/all-category-product');
    }


    public function delete_product($id){
        DB::table('tbl_category')->where('category_id',$id)->delete();
        \Illuminate\Support\Facades\Session::put('mess' ,' Xoa thanh cong');
        return \redirect('/all-category-product');
    }

//-------------------------------------XU LY CHI TIET SAN PHAM-------------------------------------------------------------------------

    public function detail_product($product_id){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();

        $detail_product = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_id',$product_id)->get();
            foreach($detail_product as $key => $value) {
                $category_id = $value->category_id;
            }

        $relate_product = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
            ->where('tbl_category.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();
        return view('/pages/sanpham/show_detail',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand)->with('detail', $detail_product)->with('relete', $relate_product);


    }



}
