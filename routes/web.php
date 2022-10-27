<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LanguageController;
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
Route::get('single-prduct/details/{id}/{slug}', [FrontendController::class, 'SingleProductDetails'])->name('single-product-details');


//  ################################## Multiple Language Part Start #################################
Route::get('language/Bangla', [LanguageController::class, 'Bangla'])->name('bangla-language');
Route::get('language/English', [LanguageController::class, 'English'])->name('english-language');

// ########## Sub Category Wise Products show  ##########
Route::get('subCatg-wise/products/{subCatgId}/{subCatgSlug}', [FrontendController::class, 'subCategoryWiseProductsView'])->name('subCagt-wise-product');
// ########## Sub SubCategory Wise Products show  ##########
Route::get('subSubCatg-wise/products/{subSubCatId}/{subSubSlug}', [FrontendController::class, 'subSubCategoryWiseProductsView'])->name('subsubCatg-wise-product');

// ########## Products Tag Wise Product show  ##########
Route::get('tagwise-product/show/{tag}', [FrontendController::class, 'productTagWiseProductShow'])->name('products-tagwise-product');

// #################### Ajax Request for select data  ####################
Route::get('category-wise/subcategory/{id}', [CategoryController::class, 'categoryWiseSubcategory'])->name('category-wise-subcategory');
Route::get('subcategory-wise/brands/{id}', [CategoryController::class, 'subcategoryWiseBrandData'])->name('subcategory-wise-brand');
Route::get('subcategory-wise/subsubcategory/{id}', [CategoryController::class, 'subcategoryWiseSubsubcategoryData'])->name('subcategory-wise-subsubcategory');

    /* ###########################################################################################
          ############################### Cart Part Start  ###############################
       ########################################################################################### */

// #################### Ajax Request for Cart Data Store  ####################
 Route::get('cart/data/store/{productId}', [CartController::class, 'cartDataStore']);
// #################### Ajax Request for Product details show  ####################
Route::get('product/view/withModal/{productId}', [FrontendController::class, 'productInfoViewWithModal'])->name('product-view-ajax');
// #################### Ajax Request for Product details show (On Mini Cart) ####################
Route::get('product/mini-cart/info', [CartController::class, 'productBuyInfoOnMiniCart']);


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

    /* ###########################################################################################
          ############################### Product Part Start  ###############################
       ########################################################################################### */
    Route::get('all-product', [ProductController::class, 'index'])->name('products');
    Route::post('product/add', [ProductController::class, 'productDataAdd'])->name('product-add');
    Route::get('manage-products', [ProductController::class, 'productDataManage'])->name('products-manage');
    Route::get('product-edit/{id}', [ProductController::class, 'productDataEdit'])->name('product-data-edit');
    Route::post('product-data/update', [ProductController::class, 'productDataUpdate'])->name('product-data-update');
    // ########## Single Product Information View  ##########
    Route::get('product-info/{id}', [ProductController::class, 'singleProductInfo'])->name('single-product-info');
    // ########## Product Active & Inactive Part  ##########
    Route::get('product-inactive/{id}', [ProductController::class, 'productDataInactive'])->name('product-data-inactive');
    Route::get('product-active/{id}', [ProductController::class, 'productDataActive'])->name('product-data-active');
    // ########## Product Multi Image Part  ##########
    Route::post('product-multiImg/update', [ProductController::class, 'productMultiImgUpdate'])->name('product-multiImg-update');
    Route::get('product-multiImg/delete/{id}', [ProductController::class, 'productMultiImgDelete'])->name('product-multiImg-delete');
    // ########## Product Main Thumbnail Image Update  ##########
    Route::post('product-mainThumbnail/update', [ProductController::class, 'productMainThumbnailUpdate'])->name('product-mainThumb-update');




    //  ################################## Product Part End #################################

    //  ################################## Banner Part Start #################################
    Route::get('banner', [BannerController::class, 'index'])->name('banners');
    Route::post('banner/add', [BannerController::class, 'bannerDataAdd'])->name('banner-add');
    Route::get('banner-edit/{id}', [BannerController::class, 'bannerDataEdit'])->name('banner-data-edit');
    Route::post('banner-data/update', [BannerController::class, 'bannerDataUpdate'])->name('banner-data-update');
    Route::get('banner-delete/{id}', [BannerController::class, 'bannerDataDelete'])->name('banner-data-delete');
    //  ################################## Banner Active && Inactive #################################
    Route::get('banner-inactive/{id}', [BannerController::class, 'BannerDataInactive'])->name('banner-data-inactive');
    Route::get('banner-active/{id}', [BannerController::class, 'BannerDataActive'])->name('banner-data-active');



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
