<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Restaurants
    Route::post('restaurants/media', 'RestaurantApiController@storeMedia')->name('restaurants.storeMedia');
    Route::apiResource('restaurants', 'RestaurantApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Orders
    Route::apiResource('orders', 'OrderApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusApiController');
});
