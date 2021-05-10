<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get('verify', 'Auth\VerifyAccountController@showVerifyForm')->name("verify");
Route::post('verifyAccount', 'Auth\VerifyAccountController@verifyAccount');

Route::namespace('web')->group(function(){


Route::get('/', 'HomeController@dashboard_1')->name("index");

Route::get('/index', 'HomeController@dashboard_1');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');

Route::get('/products/deleteItem/{id}', 'ProductController@destroy');
Route::resource('restaurant', 'RestaurantController');




Route::post('addFile', 'FileController@addFile');
Route::post('cutFast', 'FileController@cutFast');
Route::post('deleteItem', 'FileController@deleteItem');
Route::get('getUserQueueStatus', 'FileController@getUserQueueStatus');
Route::post('convert', 'FileController@convert');
Route::post('render', 'FileController@render');
Route::post('updateItemData', 'FileController@updateItemData');







Route::get('getItemData', 'FileController@getItemData');
Route::get('getMediaList', 'FileController@getMediaList');
Route::get('/orders', 'SegoadminController@orders');
Route::get('/order-id', 'SegoadminController@order_id');
Route::get('/general-customers', 'SegoadminController@general_customers');
Route::get('/analytics', 'SegoadminController@analytics');
Route::post('/selling-items', 'SegoadminController@selling_items');
Route::post('/favourite-items', 'SegoadminController@favourite_items');
Route::get('/reviews', 'SegoadminController@reviews');
Route::get('/app-calender', 'SegoadminController@app_calender');
Route::get('/app-profile', 'SegoadminController@app_profile');
Route::get('/post-details', 'SegoadminController@post_details');
Route::get('/chart-chartist', 'SegoadminController@chart_chartist');
Route::get('/chart-chartjs', 'SegoadminController@chart_chartjs');
Route::get('/chart-flot', 'SegoadminController@chart_flot');
Route::get('/chart-morris', 'SegoadminController@chart_morris');
Route::get('/chart-peity', 'SegoadminController@chart_peity');
Route::get('/chart-sparkline', 'SegoadminController@chart_sparkline');
Route::get('/ecom-checkout', 'SegoadminController@ecom_checkout');
Route::get('/ecom-customers', 'SegoadminController@ecom_customers');
Route::get('/ecom-invoice', 'SegoadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'SegoadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'SegoadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'SegoadminController@ecom_product_list');
Route::get('/ecom-product-order', 'SegoadminController@ecom_product_order');
Route::get('/email-compose', 'SegoadminController@email_compose');
Route::get('/email-inbox', 'SegoadminController@email_inbox');
Route::get('/email-read', 'SegoadminController@email_read');
Route::get('/form-editor-summernote', 'SegoadminController@form_editor_summernote');
Route::get('/form-element', 'SegoadminController@form_element');
Route::get('/form-pickers', 'SegoadminController@form_pickers');
Route::get('/form-validation-jquery', 'SegoadminController@form_validation_jquery');
Route::get('/form-wizard', 'SegoadminController@form_wizard');
Route::get('/map-jqvmap', 'SegoadminController@map_jqvmap');
Route::get('/page-error-400', 'SegoadminController@page_error_400');
Route::get('/page-error-403', 'SegoadminController@page_error_403');
Route::get('/page-error-404', 'SegoadminController@page_error_404');
Route::get('/page-error-500', 'SegoadminController@page_error_500');
Route::get('/page-error-503', 'SegoadminController@page_error_503');
Route::get('/page-forgot-password', 'SegoadminController@page_forgot_password');
Route::get('/page-lock-screen', 'SegoadminController@page_lock_screen');
Route::get('/page-login', 'SegoadminController@page_login');
Route::get('/page-register', 'SegoadminController@page_register');
Route::get('/table-bootstrap-basic', 'SegoadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'SegoadminController@table_datatable_basic');
Route::get('/uc-lightgallery', 'SegoadminController@uc_lightgallery');
Route::get('/uc-nestable', 'SegoadminController@uc_nestable');
Route::get('/uc-noui-slider', 'SegoadminController@uc_noui_slider');
Route::get('/uc-select2', 'SegoadminController@uc_select2');
Route::get('/uc-sweetalert', 'SegoadminController@uc_sweetalert');
Route::get('/uc-toastr', 'SegoadminController@uc_toastr');
Route::get('/ui-accordion', 'SegoadminController@ui_accordion');
Route::get('/ui-alert', 'SegoadminController@ui_alert');
Route::get('/ui-badge', 'SegoadminController@ui_badge');
Route::get('/ui-button', 'SegoadminController@ui_button');
Route::get('/ui-button-group', 'SegoadminController@ui_button_group');
Route::get('/ui-card', 'SegoadminController@ui_card');
Route::get('/ui-carousel', 'SegoadminController@ui_carousel');
Route::get('/ui-dropdown', 'SegoadminController@ui_dropdown');
Route::get('/ui-grid', 'SegoadminController@ui_grid');
Route::get('/ui-list-group', 'SegoadminController@ui_list_group');
Route::get('/ui-media-object', 'SegoadminController@ui_media_object');
Route::get('/ui-modal', 'SegoadminController@ui_modal');
Route::get('/ui-pagination', 'SegoadminController@ui_pagination');
Route::get('/ui-popover', 'SegoadminController@ui_popover');
Route::get('/ui-progressbar', 'SegoadminController@ui_progressbar');
Route::get('/ui-tab', 'SegoadminController@ui_tab');
Route::get('/ui-typography', 'SegoadminController@ui_typography');
Route::get('/widget-basic', 'SegoadminController@widget_basic');


});