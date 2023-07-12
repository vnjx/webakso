<?php

use App\Models\User;
use App\Models\Origin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminOriginController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardConfirmController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardActivityController;


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
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success',[StripeController::class, 'success'])->name('success');
Route::get('/cancel',[StripeController::class, 'cancel'])->name('cancel');

Route::get('/about', function () {
    return view('about', [
        "title" => "Tentang Perusahaan",
        "active" => "about",
        "alamat" => "Jl. Baturengat Hilir No. 260",
    ]);
});

Route::get('/cart', function() {
    return view('cart', [
        "title" => "Keranjang Saya",
        "active" => "cart",
    ]);
})->middleware('auth');




Route::get('/blog', [PostController::class, 'index'])->middleware('auth');

Route::get('/katalog', [ProductController::class, 'index']);

Route::get('/products/{product:slug}', [ProductController::class, 'show']);


Route::get('/origins/{origin:slug}', function(Origin $origin){
    return view('origin', [
        'title' => $origin->name,
        'daftarproduk' => $origin->daftarproduk,
        'origin' => $origin->name
    ]);
});

Route::get('posts/{post:slug}', [PostController::class, 'show'] );

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Daftar Kategori Produk',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/stoks/checkSlug', [DashboardStokController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/origins/checkSlug', [AdminOriginController::class, 'checkSlug'])->middleware('admin');

Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart')->middleware('auth');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');

Route::get('/dashboard/posts/print', [DashboardPostController::class, 'print'])->middleware('auth');
Route::post('/select', [DashboardPostController::class, 'getDate'])->middleware('admin');

Route::resource('/dashboard/activities', DashboardActivityController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/profiles', DashboardProfileController::class)->middleware('auth');
Route::resource('/dashboard/orders', DashboardOrderController::class)->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');
Route::resource('/dashboard/confirms', DashboardConfirmController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/origins', AdminOriginController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('admin');


