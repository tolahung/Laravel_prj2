<?php

namespace App\Http\Controllers;

use App\Models\Giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;
Session_start();
class cartController extends Controller
{
    public function save_cart(Request $request){
        $productId =$request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();

        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();

//        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $productId;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['content'] = $product_info->product_content;
        Cart::add($data);
        Cart::setGlobalTax(0);

        // Chuyển dữ liệu lên database
        $gh = new Giohang();
        $gh->cart_name = $data['name'];
        $gh->quantity_cart = $data['qty'];
        $gh->cart_price = $data['price'];
        $gh->cart_content = $data['options']['content'];
        $gh->save();
        return redirect('/show-cart');
    }

    public function show_cart()
    {
        $tbl_category =DB::table('tbl_category')->where('category_status','1')->get();
        $tbl_brand =DB::table('tbl_brand')->where('brand_status','1')->get();
        return view('/pages/cart/show_cart', ['tbl_category' => $tbl_category])->with('brand', $tbl_brand);
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty =$request->quantity;
        Cart::update($rowId,$qty);
        return redirect('show-cart');
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return redirect('show-cart');
    }
}

