<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});


//FRONT_END
Route::get('/home',[\App\Http\Controllers\homeController::class, 'viewHome']);
Route::get('/account',[\App\Http\Controllers\accountController::class, 'view_account']);
Route::get('/get-account-logout',[\App\Http\Controllers\accountController::class, 'get_account_logout']);

//BACK-END
//Login admin
Route::get('/admin-login',[\App\Http\Controllers\loginController::class, 'index']);
//Route::post('/saveadmin-login',[\App\Http\Controllers\loginController::class, 'save_login']); // lưu người dùng vào database
Route::post('/getadmin-login',[\App\Http\Controllers\loginController::class, 'get_login']);

Route::get('/admin-register',[\App\Http\Controllers\loginController::class, 'view_register']);
Route::post('/save-admin-register',[\App\Http\Controllers\loginController::class, 'save_register']);

//Logout admin
Route::get('/getadmin-logout',[\App\Http\Controllers\loginController::class, 'get_logout']);

Route::get('/dashboard',[\App\Http\Controllers\adminController::class, 'show_dashboard']);


//----------------------XU LY TRANG CHU-----------------------------------------
Route::get('/danhmucsanpham/{id}/click', [\App\Http\Controllers\categoryProductController::class, 'show_category_home']);
Route::get('/thuonghieusanpham/{id}/click', [\App\Http\Controllers\brandController::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{id}/click', [\App\Http\Controllers\ProductController::class, 'detail_product']);


//---------------------CATEGORY PRODUCT---------------------------------------
//Them danh muc san pham
Route::get('/add-category-product',[\App\Http\Controllers\categoryProductController::class, 'add_category_product']);
Route::post('/get-add-category-product',[\App\Http\Controllers\categoryProductController::class, 'save_add_category_product']);

// Show danh muc san pham
Route::get('/all-category-product',[\App\Http\Controllers\categoryProductController::class, 'all_category_product']);
Route::post('/get-all-category-product',[\App\Http\Controllers\categoryProductController::class, 'save_all_category_product']);

// Chuyển đổi status
Route::get('/unactive-category-product/{id}/click',[\App\Http\Controllers\categoryProductController::class, 'unactive_category_product']);
Route::get('/active-category-product/{id}/click',[\App\Http\Controllers\categoryProductController::class, 'active_category_product']);

//Upadate danh mục
Route::get('/edit-category-product/{id}/click',[\App\Http\Controllers\categoryProductController::class, 'edit_category_product']);
Route::post('/get-edit-category-product/{id}/click',[\App\Http\Controllers\categoryProductController::class, 'save_edit_category_product']);

//Delete danh muc
Route::get('/delete-category-product/{id}/click',[\App\Http\Controllers\categoryProductController::class, 'delete_category_product']);




//---------------------BRAND PRODUCT---------------------------------------
//Them danh muc san pham
Route::get('/add-brand-product',[\App\Http\Controllers\brandController::class, 'add_brand_product']);
Route::post('/get-add-brand-product',[\App\Http\Controllers\brandController::class, 'save_add_brand_product']);

// Show danh muc san pham
Route::get('/all-brand-product',[\App\Http\Controllers\brandController::class, 'all_brand_product']);
Route::post('/get-all-brand-product',[\App\Http\Controllers\brandController::class, 'save_all_brand_product']);

// Chuyển đổi status
Route::get('/unactive-brand-product/{id}/click',[\App\Http\Controllers\brandController::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{id}/click',[\App\Http\Controllers\brandController::class, 'active_brand_product']);

//Upadate danh mục
Route::get('/edit-brand-product/{id}/click',[\App\Http\Controllers\brandController::class, 'edit_brand_product']);
Route::post('/get-edit-brand-product/{id}/click',[\App\Http\Controllers\brandController::class, 'save_edit_brand_product']);

//Delete danh muc
Route::get('/delete-brand-product/{id}/click',[\App\Http\Controllers\brandController::class, 'delete_brand_product']);




//---------------------PRODUCT---------------------------------------
//Them danh muc san pham
Route::get('/add-product',[\App\Http\Controllers\productController::class, 'add_product']);
Route::post('/get-add-product',[\App\Http\Controllers\productController::class, 'save_add_product']);

// Show danh muc san pham
Route::get('/all-product',[\App\Http\Controllers\productController::class, 'all_product']);
Route::post('/get-all-product',[\App\Http\Controllers\productController::class, 'save_all_product']);

// Chuyển đổi status
Route::get('/unactive-product/{id}/click',[\App\Http\Controllers\productController::class, 'unactive_product']);
Route::get('/active-product/{id}/click',[\App\Http\Controllers\productController::class, 'active_product']);

//Upadate danh mục
Route::get('/edit-product/{id}/click',[\App\Http\Controllers\productController::class, 'edit_product']);
Route::post('/get-edit-product/{id}/click',[\App\Http\Controllers\productController::class, 'save_edit_product']);

//Delete danh muc
Route::get('/delete-product/{id}/click',[\App\Http\Controllers\productController::class, 'delete_product']);



//---------------------CART---------------------------------------
Route::get('/show-cart',[\App\Http\Controllers\cartController::class, 'show_cart'] );
Route::post('/save-cart',[\App\Http\Controllers\cartController::class, 'save_cart'] );
Route::post('/update-cart-quantity',[\App\Http\Controllers\cartController::class, 'update_cart_quantity'] );
Route::get('/delete-cart/{rowId}/click',[\App\Http\Controllers\cartController::class, 'delete_cart'] );

