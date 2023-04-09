<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowDataController;
use App\Http\Controllers\PanierController;
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
    return view('auth.login');
});
// Route::get('/Carte', function () {
//     return view('G_P.carte');
// });
// Route::resource('/product',ProduitController::class);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['auth','checkADMIN'])->group(function(){
    Route::view('PageAdmin', 'Dash.dashbord')->name('dashbord');
    Route::view('Add_Prduct', 'Dash.add_prduct')->name('Dash.add_prduct');
    Route::view('Add_Prduct1', 'app');
    Route::view('Statistic', 'Dash.statistic')->name('Dash.statistic');
    Route::view('Receiving_requests', 'Dash.receiving_requests')->name('Dash.receiving_requests');
    Route::view('Pharmacy', 'Dash.pharmacy')->name('Dash.pharmacy');
    Route::view('Buyer', 'Dash.buyer')->name('Dash.buyer');

    Route::POST('store/{id}',[ProduitController::class,'destroy'])->name('destroy');
    Route::GET('Update_Product/{id}',[ProduitController::class,'edit'])->name('product.update');

    Route::get('Add_Prduct',[ProduitController::class,'show']);
    Route::resource('/product',ProduitController::class);

    Route::get('/hh', [UserController::class, 'show']);
    Route::POST('/update-Product', [ProduitController::class,'update']);

    
    // uesr
    // Route::get('index',[PanierController::class,'check']);
    });
});

// Route::get('/index', function () {
//     return view('G_P.index');
// })->name('indexx');

Route::get('/Shop', function () {
    return view('G_P.shop');
});

Route::get('/Carte', function () {
    return view('G_P.carte');
});


Route::get('/shop-single/{id}', function () {
    return view('G_P.shop-single');
});

    Route::get('/Shop',[ShowDataController::class,'show']);
    // Route::get('/Home',[ShowDataController::class,'showNew']);
    Route::get('/index',[ShowDataController::class,'showNew'])->name('index');
    

    Route::get('/app',[ProduitController::class,'index']);

    Route::get('/shop-single/{id}',[ShowDataController::class,'shop_single'])->name('shop-single');


    Route::middleware(['checkRole'])->group(function(){
        Route::view('/Carte', 'G_P.carte')->name('Cartte');
        Route::GET('/panier/{id}',[PanierController::class,'addToPanier'])->name('carte')->middleware(['auth']);
        Route::get('/Carte',[PanierController::class,'ShowPainer']);
        Route::GET('Checkout',[PanierController::class,'Checkout'])->name('Checkout');
        Route::GET('/DeletePr/{id}',[PanierController::class,'DeletePr'])->name('DeletePr');
        Route::GET('/Show_Prix/{id}',[PanierController::class,'Shhow'])->name('DeletePr');

        Route::view('/Contact', 'G_P.Contact');
        Route::view('/Profile', 'G_P.Profile');
        Route::view('/thankyou', 'G_P.ThankYou');
        Route::POST('/Update-Profile/{id}',[UserController::class,'Update_P'])->name('Update_Profile');
        Route::view('/order-tracking', 'G_P.order')->name('');
    });
    