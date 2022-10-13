<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

// cache clear route /

Route::get('/clear-cache', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('view:clear');
    $run = Artisan::call('config:cache');
    //return \Artisan::call('db:seed');

    return 'CACHE CLEARED SUCCESSFULLY';
});

    // #################### Frontend  ####################
Route::get('/',[FrontendController::class, 'index'])->name('frontend');

// Auth::routes();
Auth::routes();

    // #################### Admin  ####################
Route::group(['prefix'=>'admin','middleware' => ['admin','auth'], 'namespace'=>'Admin'], function (){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

    // #################### Admin Profile ####################
    Route::get('profile', [AdminController::class, 'adminProfile'])->name('admin-profile');
    Route::post('profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
    Route::get('image', [AdminController::class, 'adminProfileImage'])->name('admin-profile-image');
    Route::post('image/update', [AdminController::class, 'adminProfileImageUpdate'])->name('admin-profile-image-update');
    Route::get('password', [AdminController::class, 'adminPassword'])->name('admin-password');
    Route::post('password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin-password-update');

    // #################### Category Part ####################
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('category/add', [CategoryController::class, 'categoryDataAdd'])->name('category-add');
    Route::get('category-edit/{id}', [CategoryController::class, 'categoryDataEdit'])->name('category-data-edit');
    Route::post('category-data/update', [CategoryController::class, 'categoryDataUpdate'])->name('category-data-update');
    Route::get('category-delete/{id}', [CategoryController::class, 'categoryDataDelete'])->name('category-data-delete');

    // #################### Sub Category Part ####################
    Route::get('subcategories', [CategoryController::class, 'subCategoryIndex'])->name('subcategories');
    Route::post('subcategory/add', [CategoryController::class, 'subCategoryAdd'])->name('subcategory-add');
    Route::get('subcategory-edit/{id}', [CategoryController::class, 'subcategoryDataEdit'])->name('subcategory-data-edit');
    Route::post('subcategory-data/update', [CategoryController::class, 'subcategoryDataUpdate'])->name('subcategory-data-update');
    Route::get('subcategory-delete/{id}', [CategoryController::class, 'subcategoryDataDelete'])->name('subcategory-data-delete');

    // #################### Sub subCategory Part ####################
    Route::get('sub-subcategories', [CategoryController::class, 'subSubCategoryIndex'])->name('sub-sub-categories');
    Route::post('sub-subcategory/add', [CategoryController::class, 'subSubCategoryAdd'])->name('sub-sub-category-add');
    Route::get('subsubcategory-edit/{id}', [CategoryController::class, 'subSubCategoryDataEdit'])->name('sub-sub-category-edit');
    Route::post('subsubcategory-data/update', [CategoryController::class, 'subSubCategoryDataUpdate'])->name('sub-sub-category-data-update');
    Route::get('subsubcategory-delete/{id}', [CategoryController::class, 'subSubCategoryDataDelete'])->name('sub-sub-category-data-delete');


    // #################### Brand Part ####################
    Route::get('all-brand', [BrandController::class, 'index'])->name('brands');
    Route::post('brand/add', [BrandController::class, 'brandDataAdd'])->name('brand-add');
    Route::get('brand-edit/{id}', [BrandController::class, 'brandDataEdit'])->name('brand-data-edit');
    Route::post('brand-data/update', [BrandController::class, 'brandDataUpdate'])->name('brand-data-update');
    Route::get('brand-delete/{id}', [BrandController::class, 'brandDataDelete'])->name('brand-data-delete');

    // #################### Product Part  ####################
    Route::get('all-product', [ProductController::class, 'index'])->name('products');
    Route::post('product/add', [ProductController::class, 'productDataAdd'])->name('product-add');
    Route::get('manage-products', [ProductController::class, 'productDataManage'])->name('products-manage');
    Route::get('product-edit/{id}', [ProductController::class, 'productDataEdit'])->name('product-data-edit');
    Route::post('product-data/update', [ProductController::class, 'productDataUpdate'])->name('product-data-update');

    // #################### Product Active & Inactive Part  ####################
    Route::get('product-inactive/{id}', [ProductController::class, 'productDataInactive'])->name('product-data-inactive');
    Route::get('product-active/{id}', [ProductController::class, 'productDataActive'])->name('product-data-active');

    // #################### Product Multi Image Part  ####################
    Route::post('product-multiImg/update', [ProductController::class, 'productMultiImgUpdate'])->name('product-multiImg-update');
    Route::get('product-multiImg/delete/{id}', [ProductController::class, 'productMultiImgDelete'])->name('product-multiImg-delete');






});
    // #################### User Part  ####################
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user-dashboard');
    Route::post('update/data', [UserController::class, 'updateData'])->name('update-profile');
    Route::get('image', [UserController::class, 'profileImage'])->name('profile-image');
    Route::post('image/update', [UserController::class, 'profileImageUpdate'])->name('profile-image-update');
    Route::get('password', [UserController::class, 'userPassword'])->name('user-password');
    Route::post('password/update', [UserController::class, 'userPasswordUpdate'])->name('user-password-update');
});

// #################### Ajax Request for select data  ####################
Route::get('category-wise/subcategory/{id}', [CategoryController::class, 'categoryWiseSubcategory'])->name('category-wise-subcategory');
Route::get('subcategory-wise/brands/{id}', [CategoryController::class, 'subcategoryWiseBrandData'])->name('subcategory-wise-brand');
Route::get('subcategory-wise/subsubcategory/{id}', [CategoryController::class, 'subcategoryWiseSubsubcategoryData'])->name('subcategory-wise-subsubcategory');


