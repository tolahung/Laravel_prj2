<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Table;

session_start();


class homeController extends Controller
{
    public function viewHome(){
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
        $tbl_product = DB::table('tbl_products')->where('product_status','1')->get();
        return view ('pages/home',['tbl_category'=>$tbl_category],['tbl_product'=>$tbl_product])->with('brand', $tbl_brand);
    }

//    public function __construct()
//    {
//        $this->middleware('is_account');
//    }
        public function tim_kiem(Request $request){
        $keywords = $request->keywords_submit;
            $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
            $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
            $search_product = DB::table('tbl_products')->where('product_name','like', '%'.$keywords.'%')->get();

            return view ('pages/sanpham/search',['tbl_category'=>$tbl_category])->with('brand', $tbl_brand)->with('search_product', $search_product);
        }


}
