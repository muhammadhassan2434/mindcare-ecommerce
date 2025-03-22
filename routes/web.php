<?php

use App\Http\Controllers\admin\adminlogincontroller;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\homedcontroller;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productimagescontroller;
use App\Http\Controllers\admin\productsubcategorycontroller;
use App\Http\Controllers\admin\shippingController;
use App\Http\Controllers\admin\tempimagecontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontcontroller;
use App\Http\Controllers\shopcontroller;
use App\Http\Controllers\subcategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-cache', function () {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear config cache
    Artisan::call('config:clear');

    // Clear view cache
    Artisan::call('view:clear');

    // return "All cache cleared!";
    echo "all cache cleared";
});


Route::get('/', [frontcontroller::class, 'index'])->name('front.home');
Route::get('/shop/{categoryslug?}/{subcategoryslug?}', [shopcontroller::class, 'index'])->name('front.shop');
Route::get('/product/{slug}', [shopcontroller::class, 'product'])->name('front.product');
Route::get('/Health-And-Beauty', [shopcontroller::class, 'healthAndBeauty'])->name('front.healthAndBeauty');
Route::get('/cart', [cartcontroller::class, 'cart'])->name('front.cart');
Route::post('/add-to-cart', [cartcontroller::class, 'addtocart'])->name('front.addtocart');
Route::post('/update-cart', [cartcontroller::class, 'updatecart'])->name('front.updatecart');
Route::post('/delete-item', [cartcontroller::class, 'deleteitem'])->name('front.deleteitem.cart');
Route::get('/checkout', [cartcontroller::class, 'checkout'])->name('front.checkout');
Route::post('/process-checkout', [cartcontroller::class, 'processcheckout'])->name('front.processcheckout');
Route::get('/thanks', [cartcontroller::class, 'thankyou'])->name('front.thankyou');
Route::post('/get-order-summary', [cartcontroller::class, 'getOrdersummary'])->name('front.getOrdersummary');




Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [Authcontroller::class, 'login'])->name('account.login');
        Route::post('/login', [Authcontroller::class, 'authenticate'])->name('account.authenticate');
        Route::get('/register', [Authcontroller::class, 'register'])->name('account.register');
        Route::post('/process-register', [Authcontroller::class, 'processregister'])->name('account.processregister');
        
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [Authcontroller::class, 'profile'])->name('account.profile');
        Route::get('/my-orders', [Authcontroller::class, 'orders'])->name('account.orders');
        Route::get('/order-details/{orderid}', [Authcontroller::class, 'orderDetails'])->name('account.orderDetails');
        Route::get('/logout', [Authcontroller::class, 'logout'])->name('account.logout');
        // profile updtae route 
        Route::put('/profile/update/{id}', [Authcontroller::class, 'updateProfile'])->name('front.account.update');

        // route contact
        Route::get('/contact', [ContactController::class, 'index'])->name('front.contact');
        Route::post('/contact/store', [ContactController::class, 'store'])->name('front.contact.store');
        


        
    });
});
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [adminlogincontroller::class, 'index'])->name('admin.login');
        Route::post('/authentincate', [adminlogincontroller::class, 'authentincate'])->name('admin.authentincate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [homedcontroller::class, 'logout'])->name('admin.logout');
        // category routr
        //    Route::get('/category/create',[categorycontroller::class,'create']);
        Route::get('/category', [categorycontroller::class, 'index'])->name('category.index');
        Route::view('/create', 'admin.category.create')->name('category.create');
        Route::post('/category', [categorycontroller::class, 'store'])->name('category.store');
        Route::get('/category/{category}/edit', [categorycontroller::class, 'edit'])->name('category.edit');
        Route::post('/category/{category}/update', [categorycontroller::class, 'update'])->name('category.update');
        Route::get('/category/{category}/del', [categorycontroller::class, 'destory'])->name('category.del');

        // sub category routes
        Route::get('/sub-category', [subcategoryController::class, 'index'])->name('sub-category.index');
        Route::get('/sub-category/create', [subcategoryController::class, 'create'])->name('sub_category.create');
        Route::post('/sub-category', [subcategoryController::class, 'store'])->name('sub_category.store');
        Route::get('/sub-category/{subcategory}/edit', [subcategoryController::class, 'edit'])->name('sub_category.edit');
        Route::post('/subcategory/{subcategory}', [subcategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/subcategory/{subcategory}/del', [subcategoryController::class, 'destory'])->name('subcategory.del');

        // brands routes
        Route::get('/brands', [brandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [brandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [brandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{brands}/edit', [brandController::class, 'edit'])->name('brands.edit');
        Route::post('/brands/{brands}', [brandController::class, 'update'])->name('brands.update');
        Route::get('/brands/{brands}/del', [brandController::class, 'destory'])->name('brands.del');
        
        
        // product routes
        Route::get('/product', [productcontroller::class, 'index'])->name('product.index');
        Route::get('/products/create', [productcontroller::class, 'create'])->name('products.create');
        Route::post('/products', [productcontroller::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [productcontroller::class, 'edit'])->name('products.edit');
        Route::post('/products/{product}', [productcontroller::class, 'update'])->name('products.update');
        Route::get('/product/{product}', [productcontroller::class, 'destory'])->name('product.del');
        Route::get('/get-products', [productcontroller::class, 'getproducts'])->name('product.getproducts');

        Route::post('/product-image/update', [productimagescontroller::class, 'update'])->name('products-image.update');
        Route::delete('/product-image', [productimagescontroller::class, 'destory'])->name('products-image.delete');
        
        // shipping
        
        Route::get('/shipping/create', [shippingController::class, 'create'])->name('shipping.create');
        Route::post('/shipping', [shippingController::class, 'store'])->name('shipping.store');
        Route::get('/shipping/{id}', [shippingController::class, 'edit'])->name('shipping.edit');
        Route::put('/shipping/{id}', [shippingController::class, 'update'])->name('shipping.update');
        // Route::delete('/shipping-delete/{id}', [shippingController::class, 'destroy'])->name('shipping.destroy');
        
        Route::delete('/shipping/{id}', [shippingController::class, 'destroy'])->name('shipping.delete');
        
        // order routes
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
        Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');
        Route::post('/orders/{order}/update', [OrderController::class, 'updateOrder'])->name('orders.update');

        
        // temp image routes
        Route::post('/tempimage', [tempimagecontroller::class, 'create'])->name('tempimage.create');

        // contact routes
        Route::get('/contact', [ContactController::class, 'list'])->name('admin.contact');

    });
});
