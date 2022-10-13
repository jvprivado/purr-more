<?php

use App\Http\Controllers\admin\AdminCntroller;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CsvController;
use App\Http\Controllers\admin\PreviousWinnerController;
use App\Http\Controllers\admin\ProductController;
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

Route::get('/{reactRoutes}', function () {
    return view('welcome');
})->where('reactRoutes', '|thank-you');

Route::get('blog/{slug}', function() {
    return view('welcome');
});


Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
Route::post('/admin-login-post', [AuthController::class, 'login_post'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix("admin")->middleware("auth")->group(function () {
    Route::get('/', [AdminCntroller::class, 'index'])->name('admin');
    Route::get('/all-users', [AdminCntroller::class, 'allEntrant'])->name('allEntrant');
    Route::get('/file-preview/{id}', [AdminCntroller::class, 'previewPurr'])->name('previewPurr');
    Route::get('/featured-users-list', [AdminCntroller::class, 'featuredUserList'])
        ->name('featuredUserList');
    Route::get('/delete-featured-user/{id}', [AdminCntroller::class, 'softDeleteFeaturedUser'])
        ->name('deleteFeaturedUser');

    Route::get('/make-featured-user/{id}',[AdminCntroller::class,'makeFeaturedUser'])->name('makeFeaturedUser');
    Route::get('/make-winner-of-the/{id}',[AdminCntroller::class,'makeWinnerOfTheMonth'])->name('makeWinnerOfTheMonth');
    Route::get('/make-previous-winner/{id}',[AdminCntroller::class,'makePreviousWinner'])
        ->name('makePreviousWinner');

    Route::get('/add-banner',[BannerController::class,'addBanner'])->name('addBanner');
    Route::post('/upload-banner',[BannerController::class,'uploadBanner'])->name('uploadBanner');
    Route::get('/recent-banners',[BannerController::class,'recentBanners'])->name('recentBanners');
    Route::get('/make-old-banner/{id}',[BannerController::class,'makeOld'])->name('makeOld');
    Route::get('/old-banners',[BannerController::class,'oldBanners'])->name('oldBanners');
    Route::get('/make-recent-banner/{id}',[BannerController::class,'makeRecent'])->name('makeRecent');

    Route::get('csv-for-mediacom',[CsvController::class,'mediacomView'])->name('mediacomView');
    Route::post('csv-for-mediacom',[CsvController::class,'mediacom'])->name('mediacomDownload');

    Route::get('/add-product',[ProductController::class,'addProduct'])->name('addProduct');
    Route::post('/upload-product',[ProductController::class,'uploadProduct'])->name('uploadProduct');
    Route::get('/product-list',[ProductController::class,'productList'])->name('productList');
    Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('editProduct');
    Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('updateProduct');

    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('addBlog');
    Route::post('upload-blog',[BlogController::class,'uploadBlog'])->name('uploadBlog');
    Route::get('/blog-list',[BlogController::class,'blogList'])->name('blogList');
    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('editBlog');
    Route::post('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('updateBlog');
    Route::get('/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('deleteBlog');

    Route::get('/add-previous-winner',[PreviousWinnerController::class,'addPreviousWinner'])
        ->name('addPreviousWinner');
    Route::post('upload-previous-winner',[PreviousWinnerController::class,'uploadPreviousWinner'])
        ->name('uploadPreviousWinner');
    Route::get('/previous-winner-list', [PreviousWinnerController::class, 'previousWinnerList'])
        ->name('previousWinnerList');
    Route::get('/edit-previous-winner/{id}',[PreviousWinnerController::class,'editPreviousWinner'])
        ->name('editPreviousWinner');
    Route::post('/update-previous-winner/{id}',[PreviousWinnerController::class,'updatePreviousWinner'])
        ->name('updatePreviousWinner');
    Route::get('/delete-previous-winner/{id}',[PreviousWinnerController::class,'deletePreviousWinner'])
        ->name('deletePreviousWinner');
});
