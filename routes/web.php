<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@sendSms')->name('sendSms');

//Route::get('/articles/{articleSlug}' , 'ArticleController@single');  //todo add in after time
Route::get('/restaurant/{restaurantSlug}' , 'RestaurantController@index');



Route::group(['namespace' => 'Panel','middleware' => 'auth:web', 'prefix' => 'panel'], function () {
    Route::get('/', 'PanelController@index')->name('panel');

    //comment
    Route::post('comment/accept/{comment_id}', 'CommentController@accept')->name('comment.accept')->middleware('can:comment');
    Route::post('comment/unAccept/{comment_id}', 'CommentController@unAccept')->name('comment.unAccept')->middleware('can:comment');
    Route::resource('comment', 'CommentController')->middleware('can:comment');

    //user
    Route::post('user/accept/{user_id}', 'UserController@accept')->name('user.accept');
    Route::post('user/unAccept/{user_id}', 'UserController@unAccept')->name('user.unAccept');
    Route::resource('user', 'UserController');
    Route::resource('admin/role', 'RoleController')->middleware('can:admin-role');
    Route::resource('admin/permission', 'PermissionController')->middleware('can:admin-role');
    Route::resource('admin', 'AdminController', ['parameters' => ['role' => 'user']])->middleware('can:admin-role');
    Route::resource('servant', 'ServantController');
    Route::resource('banner', 'BannerController');
    Route::group(['namespace' => 'Restaurant'], function () {
        Route::post('restaurant/accept/{restaurant_id}', 'RestaurantController@accept')->name('restaurant.accept');
        Route::post('restaurant/unAccept/{restaurant_id}', 'RestaurantController@unAccept')->name('restaurant.unAccept');
        Route::resource('/restaurant/offer', 'OfferController');
        Route::resource('/restaurant', 'RestaurantController');
    });

    Route::resource('static-page', 'PagesController');

    //setting
    Route::get('menu', 'SettingController@menu')->name('menu.index');
    Route::post('menu', 'SettingController@addToMenu')->name('menu.store');
    Route::delete('menu/{menu}', 'SettingController@removeToMenu')->name('menu.destroy');
//    Route::get('namad', 'SettingController@namad')->name('namad.index');
    Route::get('slider', 'SettingController@slider')->name('slider.index');
    Route::get('logo', 'SettingController@logo')->name('logo.index');
    Route::get('footer', 'SettingController@footer')->name('footer.index');
    Route::post('footer', 'SettingController@addFooter')->name('footer.store');

    //        Route::resource('articles', 'ServerController');

});
Auth::routes();

Route::get('register-form','HomeController@registerForm')->name('formRestaurant.index');
Route::post('register-form','HomeController@setRegisterForm')->name('formRestaurant.store');
Route::get('registerRestaurant','HomeController@registerRestaurant');
Route::get('{page}','HomeController@staticPages');
