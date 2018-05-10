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

Route::get('/','ProductController@getIndex')->name('product.index');



//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'user'], function(){
    Auth::routes();
    Route::get('profile', 'UserController@getProfile')->name('profile')->middleware('auth');
});
Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddToCart',
    'as'=>'product.addToCart'
]);
Route::get('/reduce/{id}','ProductController@getReduceByOne')->name ('product.reduceByOne');
Route::get('/remove/{id}','ProductController@getRemoveItem')->name ('product.remove');
Route::get('/shopping-cart',[
    'uses'=>'ProductController@getCart',
    'as'=>'product.shoppingCart'
]);
Route::get('/checkout',[
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);
Route::get('/delete-order/{id}','OrderController@deleteOrder') -> name('deleteOrder');
Route::get('categories-all', 'CategoryController@getCategories')->name('categories');
Route::get('categories-profile/{categories_id}', 'ProductController@categoryProfile')->name('category.profile');

Route::group(['middleware'=>['admin']], function(){

    Route::get('admin-users', 'UserController@getAll')->name('adminUsers');
    Route::get('add-user', 'UserController@addUserForm')->name('addUserForm');
    Route::post('add-user', 'UserController@addUser');
    Route::any('edit-user/{id}', 'UserController@editUser')->name('editUser');
    Route::get('delete-user/{id}', 'UserController@deleteUser')->name('deleteUser');
    Route::get('admin-products', 'ProductController@getAll')->name('adminProducts');
    Route::get('add-product', 'ProductController@addProductForm')->name('addProductForm');
    Route::post('add-product', 'ProductController@addProduct');
    Route::any('edit-product/{id}', 'ProductController@editProduct')->name('editProduct');
    Route::get('delete-product/{id}', 'ProductController@deleteProduct')->name('deleteProduct');
    Route::get('admin-orders', 'OrderController@getOrders')->name('adminOrders');

});

