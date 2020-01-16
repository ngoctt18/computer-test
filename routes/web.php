<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::middleware('auth:admin')->group(function() {
        Route::resource('/brands', 'Brands\BrandController');

        Route::resource('/catagories', 'Catagories\CatagoryController');

        Route::resource('/customers', 'Customers\CustomerController');

        Route::resource('/employees', 'Employees\EmployeeController');

        Route::resource('/orders', 'Orders\OrderController');

        Route::resource('/products', 'Products\ProductController');
        // Route::post('/products/{id}/deleteImg/{index}', 'Products\ProductController@deleteImg')->name('deleteImg');

        Route::resource('/apriori', 'Machinelearning\AprioriController');
        Route::resource('/kmean', 'Machinelearning\KmeanController');

        // Route::resource('/statistics', 'Statistics\DashboardController');
    });
});


Route::group(['namespace' => 'Website'], function () {
    Route::get('/', 'HomeController@homepage')->name('homepage');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::post('/register', 'Auth\RegisterController@register')->name('register');

    Route::put('/updateaccount/{id}','Account\MyaccountController@updateaccount')->name('updateaccount');
    
    Route::get('/shop', 'Product\ShopController@shop')->name('products.shop');    
    Route::get('/shop/category', 'Product\ShopController@category')->name('products.shop.category');
    Route::get('/shop/brand', 'Product\ShopController@brand')->name('products.shop.brand');
    Route::get('/shop/color', 'Product\ShopController@color')->name('products.shop.color');

    Route::get('/detail/{product}', 'Product\DetailController@detail')->name('products.detail');

    Route::get('/wishlist', 'Other\WishlistController@wishlist')->name('others.wishlist');

    Route::get('/myaccount', 'Account\MyaccountController@myaccount')->name('accounts.myaccount');

    Route::get('/contactus', 'Contact\ContactusController@contactus')->name('contacts.contactus');
    
    Route::get('/cart', 'Order\CartController@cart')->name('orders.cart');
    Route::post('/add-to-cart/{id}', 'Order\CartController@addToCart')->name('orders.addToCart');
    Route::get('/delete-cart/{id}', 'Order\CartController@deleteCart')->name('orders.delete-cart');
    Route::get('/update-cart/{id}', 'Order\CartController@updateCart')->name('orders.updateCart');


    
    Route::middleware('auth')->group(function() {
        Route::middleware('checkCartEmpty')->group(function() {
            Route::get('/checkout', 'Order\CheckoutController@checkout')->name('orders.checkout');

            Route::post('/checkoutCart', 'Order\CheController@checkoutCart')->name('orders.checkoutCart');

            Route::post('/storeCheckout', 'Order\CheckoutController@storeCheckout')->name('orders.storeCheckout');
        });
    });
});
          