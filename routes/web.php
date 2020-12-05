<?php
// Auth::routes();
Route::get('/', 'IndexController@index');
Route::get('/c/{cateSlug}', 'IndexController@cateDetail');
Route::get('/p/{proSlug}', 'IndexController@productDetail');
Route::post('/addCart', 'IndexController@addCart');
Route::get('/getCart', 'IndexController@getCart');
Route::post('/deleteCartItem', 'IndexController@deleteItemCart');

Route::get('/search', 'IndexController@search')->name('search');


Route::get('/login', 'Auth\LoginController@showUserLoginForm');
Route::post('/login', 'Auth\LoginController@userLogin')->middleware('throttle:5,5');

Route::get('/register', 'Auth\RegisterController@showCustomerRegisterForm');
Route::post('/register', 'Auth\RegisterController@createCustomer');
// ========== For User =============================================
Route::group(['middleware' => ['customer']], function () {
    // Đăng Xuất -- CUSTOMER
    Route::post('logout', 'UserController@customerLogout');

    Route::get('change-pasword', 'UserController@formChangePassword');
    Route::post('change-pasword', 'UserController@changePassword');

    Route::get('user-info', 'IndexController@userInfo');
    Route::get('add-user-info', 'IndexController@formAddUserInfo');
    Route::post('add-user-info', 'IndexController@addUserInfo');

    Route::get('edit-user-info/{id}', 'IndexController@formEditUserInfo');
    Route::post('edit-user-info/{id}', 'IndexController@editUserInfo');
    Route::post('delete-user-info', 'IndexController@deleteUserInfo');

    Route::get('checkout', 'IndexController@formCheckout');
    Route::post('checkout', 'IndexController@checkOut');
});
// ========== For Admin =============================================
Route::get('admin/login', 'Auth\LoginController@showAdminLoginForm');
Route::post('admin/login', 'Auth\LoginController@adminLogin');
Route::group(['middleware' => ['admin']], function () {
    // Đăng Xuất -- ADMIN
    Route::post('admin/logout', 'AdminController@adminLogout');

    Route::get('admin/dashboard', 'AdminController@dashboard');
    // Hiển thị - Thêm - Sữa - Xóa - Cấu hình
    Route::get('admin/list-configs', 'ConfigController@index');
    Route::get('admin/add-config', 'ConfigController@showAddConfig');
    Route::post('admin/add-config', 'ConfigController@addConfig');

    Route::get('admin/edit-config/{id}', 'ConfigController@showEditConfig');
    Route::post('admin/edit-config/{id}', 'ConfigController@editConfig');
    Route::post('admin/delete_config/{id}', 'ConfigController@deleteConfig');
    // Hiển thị - Thêm - Sữa - Xóa - Cấu hình chi tiết
    Route::get('admin/list-config-detail/{id}', 'ConfigDetailController@index');
    Route::get('admin/add-config-detail/{id}', 'ConfigDetailController@showAddConfig');
    Route::post('admin/add-config-detail/{id}', 'ConfigDetailController@addConfig');

    Route::get('admin/edit-config-detail/{id}', 'ConfigDetailController@showEditConfig');
    Route::post('admin/edit-config-detail/{id}', 'ConfigDetailController@editConfig');
    Route::post('admin/delete_config-detail/{id}', 'ConfigDetailController@deleteConfig');
    // Hiển thị - Thêm - Sữa - Xóa - Category
    Route::get('admin/list-categories', 'CategoryController@index');
    Route::get('admin/add-category', 'CategoryController@showAddCategory');
    Route::post('admin/add-category', 'CategoryController@addCategory');

    Route::get('admin/edit-category/{id}', 'CategoryController@showEditCategory');
    Route::post('admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::post('admin/delete-category/{id}', 'CategoryController@deleteCategory');
    // Hiển thị - Thêm - Sữa - Xóa - Product
    Route::get('admin/list-products', 'ProductController@index');

    Route::get('admin/{cateSlug}/list-products', 'ProductController@proInCate');

    Route::get('admin/add-product', 'ProductController@showAddProduct');
    Route::post('admin/add-product', 'ProductController@addProduct');

    Route::get('admin/edit-product/{id}', 'ProductController@showEditProduct');
    Route::post('admin/edit-product/{id}', 'ProductController@editProduct');
    Route::post('admin/delete-product/{id}', 'ProductController@deleteProduct');

    Route::get('admin/customers', 'AdminController@listCustomer');
    Route::post('admin/change-status-customer/{id}', 'AdminController@changeStatus');

    Route::get('admin/orders', 'AdminController@listOrder');
    Route::get('admin/order-detail/{id}', 'AdminController@orderDetail');
    Route::post('admin/done-order', 'AdminController@doneOrder');

    Route::get('admin/delivered', 'AdminController@listDelivered');
});
