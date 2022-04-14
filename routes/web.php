<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\EmployeeSalary;
// ashim controller add
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeeController;



// for frontend
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ShopController;

// for user
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\PageCartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\SocialiteLoginController;

use App\Models\User;


// Home Route
// Route::get('/', function () {
//     return view('welcome');
// });

// Admin prefix route
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){



// Admin Route
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


// admin logout route
Route::get('admin/logout', [AdminController::class, 'loginForm'])->name('admin.logout');


// admin profile route
Route::get('admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.admin_profile_view');

// admin profile Edit route
Route::get('admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.admin_profile_edit');

////Admin Profile edit store route
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

////Admin password change
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.admin_change_password');

////Admin update password
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

});



// User Route
// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard', compact('user'));
})->name('dashboard');


// Frontend Route
Route::get('/', [IndexController::class, 'index'])->name('user.index');

// User Logout Route
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');


// User Update Profile
Route::get('/user/profile/update', [IndexController::class, 'UserProfile'])->name('user.profile');

// user profile store
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');


// user Change Password
Route::get('/user/change/password', [IndexController::class, 'UserChnagePassword'])->name('change.password');


// user  Password Update
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');



// Admin All Brands Route Group
Route::prefix('brand')->group(function(){

    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');

    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

    // Route::get('/brand/destroy/{brand_id}', [BrandController::class, 'destroy']);

});



// Admin All Category Route Group
Route::prefix('category')->group(function(){

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

});

// Admin All SUb Category Route Group
Route::prefix('subcategory')->group(function(){

    Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

    Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    Route::get('/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');


});

// Admin All Sub SUb Category Route Group
Route::prefix('subsubcategory')->group(function(){

    Route::get('/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

    // sub sub category route
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    // for auto select sub sub category route
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

  //Sub  Sub category store
  Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

  // Sub sub Catageroy edit
 Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

 Route::post('/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

 Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');


});

// Admin Product Route Group
Route::prefix('product')->group(function(){

    Route::get('/view', [ProductController::class, 'ProductAdd'])->name('product.add');

    Route::get('/info/{id}', [ProductController::class, 'ProductAllInfoView'])->name('product.all_info_view');




    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product_store');


    // Manage Product
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    // Edit Product
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    // Upadte Product
    Route::post('/update', [ProductController::class, 'UpdateProduct'])->name('product_update');

    // For Multiple Img Update
    Route::post('/update/multiimg', [ProductController::class, 'UpdateProductMultiImg'])->name('update_product_img');
    // for Multipart Deleted
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');


   // For Thambnail Img Update
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');


    //===================================Product Active And Deactive========================================
    // for Deactive
    Route::get('/deactive/{id}', [ProductController::class, 'ProductDeactive'])->name('product.deactive');
    // for Active
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

     //===================================Product Delete========================================
     Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');


});

    // Slider  Route Group
    Route::prefix('slider')->group(function(){

    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage.slider');

    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

     //===================================Product Active And Deactive==================================
    // for Deactive
    Route::get('/deactive/{id}', [SliderController::class, 'SliderDeactive'])->name('slider.deactive');
    // for Active
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');


});




// Admin Coupon  Route Group
Route::prefix('cupons')->group(function(){

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage.coupon');

    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');

    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');

}); // end coupon prefix



// Admin Banner  Route Group
Route::prefix('banner')->group(function(){
    Route::get('/view',[BannerController::class,'BennarView'])->name('bennar.manage');
    Route::post('/store',[BannerController::class,'BennarStore'])->name('bennar.store');
    Route::get('/edit/{id}',[BannerController::class,'BennarEdit'])->name('bennar.edit');
    Route::post('/update',[BannerController::class,'BennarUpdate'])->name('bennar.update');
    Route::get('/dalete{id}',[BannerController::class,'BennarDelete'])->name('bennar.delete');



 // for Deactive
    Route::get('/deactive/{id}', [BannerController::class, 'BennarDeactive'])->name('bennar.deactive');
    // for Active
    Route::get('/active/{id}', [BannerController::class, 'BennarActive'])->name('bennar.active');
});




// Admin Orders  Route Group
Route::prefix('orders')->group(function(){

    // pending order view
    Route::get('/pending/orders', [OrderController::class, 'PendingOrder'])->name('pending.orders');

    // Pending Orders Details
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.orders.details');

   // Confirmed Orders
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('confirm-processing');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');


    // update route all################################################################################################
   //for confirm
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    // fro processing
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

    // for  picdate
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

   // for shiped
   Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');


    // for delevery
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered_20'])->name('shipped.delivered');

     // for cancel
     Route::get('/delivered/cancel/{order_id}', [OrderController::class, 'DeliveredToCancel'])->name('delivered.cancel');

     // Order Invoice Download
     Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
}); // end coupon prefix






    // Admin Product Strock Routes
    Route::prefix('product')->group(function(){

        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');


        }); // end Product Stock











    // Admin All user role###########################################################################
        Route::prefix('adminuserrole')->group(function(){

        Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');

        Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

        Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');

        Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

        Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');

        Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');


    }); // All user role





////////////////SUPPLIERS ROUTE--------Start ############

Route::prefix('suppliers')->group(function()
{
    Route::get('/view',[SupplierController::class,'show'])->name('suppliers.show');
    Route::post('/store',[SupplierController::class,'store'])->name('suppliers.store');
    Route::get('/delete/{id}',[SupplierController::class,'delete'])->name('suppliers.delete');
    Route::get('/edit/{id}',[SupplierController::class,'edit'])->name('suppliers.edit');
    Route::post('/update/{id}',[SupplierController::class,'update'])->name('suppliers.update');
});






////////////////SUPPLIERS ROUTE--------END #########






    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

    // Admin Reports Routes
    Route::prefix('reports')->group(function(){

        Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

        // Search Date Report
        Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

        // Search Month Report
        Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

        // Search Year Report
        Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');


        });  // end Reports


        // Admin Get All User Routes
        Route::prefix('alluser')->group(function(){

            // All user view
            Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');

       }); // end user Get



        // Admin Return Order Show Routes
        Route::prefix('return')->group(function(){

            // Return Request Show
            Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');

            // Return Request Approve
            Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

            // Return All Request
            Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

            });


            // Admin Site Setting Routes (logo, social link etc)
            Route::prefix('setting')->group(function(){

            // view
            Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');

            // update
            Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');

            // Seo
            Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');

            // Seo Meta data
            Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
             });

//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


















// Admin Coupon  Route Group
Route::prefix('shipping')->group(function(){


     /// ship Division
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage.division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');


  /// ship District
  Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage.district');

  Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

  Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

  Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistricUpdate'])->name('district.update');

  Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistricDelete'])->name('district.delete');




  /// Ship State
  Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage.state');

  Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

  Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

  Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

  Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');


});

// end coupon prefix  manage.state



// Multi language
// Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
// Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');


// product detail route
Route::get('/product/detail/{id}', [IndexController::class, 'ProductDetails']);


// Frontend tags page route
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);


// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}', [IndexController::class, 'SubCatWiseProduct']);


// Frontend Sub  SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}', [IndexController::class, 'SubSubCatWiseProduct']);

// Product view model ajax card
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Product Add to cart route ajax  use in package
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Product mini Cart ajax data
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart product
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist product
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);





######### Start Product wishlist only view Auth user in use middleware ###########

Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

// Product Wishlist page
Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

// Product Wishlist show data
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

// Remove  Wishlist Product
Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

// for paytmet gatway route
Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');


// cash no delivery
Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

// My orders page
Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

// user order_details
Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

// PDF invoices download
Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

// Order Return Route
Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

// order return list
Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
// order cancel
Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');

// /// Order Traking Route
// Route::get('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

});
####### End Product wishlist only view Auth user in use middleware  #############






// My cart page view
Route::get('/user/mycart', [PageCartController::class, 'MyCart'])->name('mycart');

// My Cart show data
Route::get('/user/get-cart-product', [PageCartController::class, 'GetCartProduct']);

// Remove  Wishlist Product
Route::get('/user/cart-remove/{rowId}', [PageCartController::class, 'RemoveCartProduct']);

// product increment botton route
Route::get('/cart-increment/{rowId}', [PageCartController::class, 'CartIncrement']);

// product Decrement botton route
Route::get('/cart-decrement/{rowId}', [PageCartController::class, 'CartDecrement']);


// Frontend Coupon  apply
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

// Frontend Coupon Calculation
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

// Coupon Remove
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);



//################# start Checkout Route //####################
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
// Check out store route
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
//################ End Checkout Route //####################


//################ Division District and state auto select Route //################
// district
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
// State
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
//#################  End Division District and state auto select Route  //#############



/// Product Search Route
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');
Route::get('/searchColor/{color}', [IndexController::class, 'searchByColor'])->name('product.searchColor');

// Shop Page Route

Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');

//Facebook Login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [SocialiteLoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [SocialiteLoginController::class, 'handleFacebookCallback']);
// google login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

// Twitter Login
Route::get('login/twitter', [App\Http\Controllers\Auth\LoginController::class, 'redirectToTwitter'])->name(name:'login.twitter');
Route::get('login/twitter/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleTwitterCallback']);

// for department employee salary
Route::prefix('salary')->group(function(){

    // All user view
    Route::get('/add', [EmployeeSalary::class, 'AddSalary'])->name('salary-add');
    Route::get('/get_employee/{id}', [EmployeeSalary::class,'getEmployee'])->name('get.employee');
    Route::post('/get_employee', [EmployeeSalary::class,'find'])->name('employee.find');
    Route::post('/salary_payment', [EmployeeSalary::class,'getSalary'])->name('payment_salary');
    Route::get('/paid_salary', [EmployeeSalary::class,'paidSalary'])->name('paid_salary');

    Route::get('/paid_salary', [EmployeeSalary::class,'paidSalary'])->name('paid_salary');

});

// end for department employee salary


//subscribe route start

Route::post('/subscribe',[IndexController::class,'subscribe'])->name('subscribe');

//subscribe route end


//Review route start


Route::post('/review/{id}',[IndexController::class,'review'])->name('review');


//Review Search end


//front_end Search data

// ashim start
// Admin All Department Route Group

Route::prefix('department')->group(function(){
    Route::get('/view', [DepartmentController::class, 'DepartmentView'])->name('department.view');
    Route::post('/store', [DepartmentController::class, 'DepartmentStore'])->name('department.store');
    Route::get('/edit/{id}', [DepartmentController::class, 'DepartmentEdit'])->name('department.edit');
    Route::post('/update', [DepartmentController::class, 'DepartmentUpdate'])->name('department.update');
    Route::get('/delete/{id}', [DepartmentController::class, 'DepartmentDelete'])->name('department.delete');

});

//  Employee Route Group
Route::prefix('employee')->group(function(){
    Route::get('/view', [EmployeeController::class, 'EmployeeView'])->name('employee.view');
    Route::get('/addform', [EmployeeController::class, 'EmployeeAddForm'])->name('employee.addform');
    Route::post('/store', [EmployeeController::class, 'EmployeeStore'])->name('employee.store');

 // Edit Employee
Route::get('/edit/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employee.edit');
// Upadte Employee
Route::post('/update', [EmployeeController::class, 'EmployeeUpdate'])->name('employee.update');

  //Employee Full View
  Route::get('/details/{id}', [EmployeeController::class, 'EmployeeDetails'])->name('employee.details');

  Route::get('/delete/{id}', [EmployeeController::class, 'EmployeetDelete'])->name('employee.delete');



});



