<?php

use Illuminate\Support\Facades\Route;

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

// メンテナンス画面に画面遷移
Route::get('/mainten','Auth\MaintenController@index');

Route::group(['middleware' => ['mainten']], function() {
    // login画面に画面遷移
    Route::redirect('/', 'auth/login',301);

    // login画面に画面遷移
    Route::redirect('/auth', 'auth/login',301);

    Route::post('auth/login', 'Auth\LoginController@postLogin')->name('post.login');
    Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('get.login');
    Route::get('auth/logout', 'Auth\LoginController@getLogout')->name('logout');

    Route::get('auth/register', 'Auth\LoginController@getRegister')->name('get.register');
    Route::post('auth/register', 'Auth\LoginController@postRegister')->name('post.register');
});

Route::group(['middleware' => ['mainten']], function() {
    Route::group(['prefix' => 'dm'], function (){
        Route::group(['prefix' => 'collect'], function (){
            Route::get("/", "Dm\DmCollectController@getIndex");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getCsv");
            Route::get("dm/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getDm");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmCollectController@postStaffEachBase");
        });

        Route::group(['prefix' => 'confirm'], function (){
            Route::get("/", "Dm\DmConfirmController@getIndex");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmConfirmController@postStaffEachBase");
        });

        Route::group(['prefix' => 'dm_syaken'], function (){
            Route::get("/", "Dm\DmSyakenController@getIndex");
            Route::post("bulk-update/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@postBulkUpdate");
            Route::post("dm-check/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@postDmCheck");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmSyakenController@postStaffEachBase");
        });

        Route::group(['prefix' => 'dm_tenken'], function (){
            Route::get("/", "Dm\DmTenkenController@getIndex");
            Route::post("bulk-update/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@postBulkUpdate");
            Route::post("dm-check/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@postDmCheck");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenController@postStaffEachBase");
        });

        Route::group(['prefix' => 'dm_tenken_last'], function (){
            Route::get("/", "Dm\DmTenkenLastController@getIndex");
            Route::post("bulk-update/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@postBulkUpdate");
            Route::post("dm-check/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@postDmCheck");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getInsuranceContact");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Dm\DmTenkenLastController@postStaffEachBase");
        });
    });

    Route::group(['prefix' => 'dm_hanyou'], function() {
        Route::group(['prefix' => 'collect'], function() {
            Route::get("/", "DmHanyou\DmCollectController@getIndex");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getCsv");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmCollectController@postStaffEachBase");
        });

        Route::group(['prefix' => 'confirm'], function() {
            Route::get("/", "DmHanyou\DmConfirmController@getIndex");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmConfirmController@postStaffEachBase");
        });

        Route::group(['prefix' => 'dm'], function() {
            Route::get("/", "DmHanyou\DmHanyouController@getIndex");
            Route::post("bulk-update/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@postBulkUpdate");
            Route::post("dm-check/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@postDmCheck");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "DmHanyou\DmHanyouController@postStaffEachBase");
        });
    });

    Route::group(['prefix' => 'graph'], function (){
        Route::group(['prefix' => 'syaken_ikou'], function (){
            Route::get("/", "Graph\SyakenIkouController@getIndex");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getCreditEdit");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getDentatsuMemo");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\SyakenIkouController@getSyatenkenEdit");
        });

        Route::group(['prefix' => 'tenken_ikou'], function (){
            Route::get("/", "Graph\TenkenIkouController@getIndex");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getCreditEdit");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getDentatsuMemo");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Graph\TenkenIkouController@getSyatenkenEdit");
        });
    });

    Route::group(['prefix' => 'hoken'], function(){
        Route::group(['prefix' => 'ikou'], function(){
            Route::get("/", "Hoken\HokenIkouController@getIndex");
            Route::put("create-insurance/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@putCreateInsurance");
            Route::get("create-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCreateKaiyaku");
            Route::put("create-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@putCreateKaiyaku");
            Route::get("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCreate");
            Route::put("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@putCreate");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCreditEdit");
            Route::get("csv-all/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCsvAll");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getCsv");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getDentatsuMemo");
            Route::put("edit-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@putEditKaiyaku");
            Route::get("edit-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getEditKaiyaku");
            Route::get("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getEdit");
            Route::put("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@putEdit");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenIkouController@getSyatenkenEdit");
        });

        Route::group(['prefix' => 'list_keizoku'], function(){
            Route::get("/","Hoken\HokenKeizokuController@getIndex");
            Route::put("create-insurance/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@putCreateInsurance");
            Route::get("create-insurance/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCreateInsurance");
            Route::put("create-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@putCreateKaiyaku");
            Route::get("create-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCreateKaiyaku");
            Route::get("create/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCreate");
            Route::put("create/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@putCreate");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCreditEdit");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getCsv");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getDentatsuMemo");
            Route::get("edit-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@putEditKaiyaku");
            Route::get("edit-kaiyaku/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getEditKaiyaku");
            Route::put("edit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@putEdit");
            Route::get("edit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getEdit");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}","Hoken\HokenKeizokuController@getSyatenkenEdit");
        });

        Route::group(['prefix' => 'result'], function(){
            Route::get("/", "Hoken\HokenResultController@getIndex");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getCsv");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultController@postStaffEachBase");
        });

        Route::group(['prefix' => 'result_staff'], function(){
            Route::get("/", "Hoken\HokenResultStaffController@getIndex");
            Route::post("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@postEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Hoken\HokenResultStaffController@postStaffEachBase");
        });
    });


    Route::group(['prefix' => 'honsya'], function (){
        Route::group(['prefix' => 'base'], function (){
            Route::group(['middleware' => ['RoleTentyou']], function() {
                Route::get("/", "Honsya\BaseController@getIndex");
                Route::put("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@putCreate");
                Route::get("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getCreate");
                Route::put("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@putEdit");
                Route::get("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getEdit");
                Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getIndex");
                Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getSearch");
                Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getSort");
            });

            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getSearchParams");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@getSortValue");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\BaseController@postStaffEachBase");
        });

        Route::group(['prefix' => 'info'], function (){
            Route::get("/", "Honsya\InfoController@getIndex");
            Route::put("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@putCreate");
            Route::get("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getCreate");
            Route::put("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@putEdit");
            Route::get("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\InfoController@postStaffEachBase");
        });

        Route::group(['prefix' => 'log'], function (){
            Route::get("/", "Honsya\LogMonthController@getIndex");
            Route::post("download/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@postDownload");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\LogMonthController@postStaffEachBase");
        });

        Route::group(['prefix' => 'upload'], function (){
            Route::get("/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\CsvController@getUpload");
            Route::post("/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\CsvController@postUpload")->name('post.honsya');
        });

        Route::group(['prefix' => 'user'], function (){
            Route::get("/", "Honsya\UserController@getIndex");
            Route::get("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getCreate");
            Route::put("create/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@putCreate");
            Route::get("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getEdit");
            Route::put("edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@putEdit");
            Route::get("face-image/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@deleteFaceImage");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Honsya\UserController@postStaffEachBase");
        });
    });



    Route::group(['prefix' => 'main'], function (){
        Route::group(['prefix' => 'customer'], function (){
            Route::get("/", "Main\CustomerController@getIndex");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getCreditEdit");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getCsv");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getDentatsuMemo");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\CustomerController@getSyatenkenEdit");
        });

        Route::group(['prefix' => 'syaken'], function (){
            Route::get("/", "Main\SyakenController@getIndex");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getCreditEdit");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getCsv");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getDentatsuMemo");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\SyakenController@getSyatenkenEdit");
        });

        Route::group(['prefix' => 'tenken'], function (){
            Route::get("/", "Main\TenkenController@getIndex");
            Route::get("credit-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getCreditEditSubmit");
            Route::get("credit-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getCreditEdit");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getCsv");
            Route::get("dentatsu-memo-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getDentatsuMemoSubmit");
            Route::get("dentatsu-memo/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getDentatsuMemo");
            Route::get("hoken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getHokenEditSubmit");
            Route::get("hoken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getHokenEdit");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@postStaffEachBase");
            Route::get("syatenken-edit-submit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSyatenkenEditSubmit");
            Route::get("syatenken-edit/{one?}/{two?}/{three?}/{four?}/{five?}", "Main\TenkenController@getSyatenkenEdit");
        });
    });



    Route::group(['prefix' => 'mut'], function (){
            Route::group(['middleware' => ['RoleAdmin']], function() {
                Route::get("dm", "Mut\DmController@getIndex");
                Route::get("dm/index/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getIndex");
                Route::get("dm/pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getPager");
                Route::get("dm/search/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getSearch");
                Route::get("dm/sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getSortValue");
                Route::get("dm/sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getSort");

                Route::get("dm_hanyou", "Mut\DmHanyouController@getIndex");
                Route::get("dm_hanyou/index/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getIndex");
                Route::get("dm_hanyou/pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getPager");
                Route::get("dm_hanyou/search/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getSearch");
                Route::get("dm_hanyou/sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getSort");
            });

        Route::group(['prefix' => 'dm'], function (){
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getCsv");
            Route::get("images/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getImages");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getMaxMinData");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getSearchParams");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@getSortParams");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmController@postStaffEachBase");
        });

        Route::group(['prefix' => 'dm_hanyou'], function (){
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getCsv");
            Route::get("images/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getImages");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getMaxMinData");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getSearchParams");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@getSortValue");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\DmHanyouController@postStaffEachBase");
        });

        Route::group(['prefix' => 'kekka'], function (){
            Route::get("/", "Mut\KekkaController@getIndex");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@postStaffEachBase");
            Route::post("upload/{one?}/{two?}/{three?}/{four?}/{five?}", "Mut\KekkaController@postUpload");
        });
    });


    Route::group(['prefix' => 'result'], function (){
        Route::group(['prefix' => 'bouei'], function (){
            Route::get("/", "Result\BoueiController@getIndex");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\BoueiController@postStaffEachBase");
        });

        Route::group(['prefix' => 'car'], function (){
            Route::get("/", "Result\CarTypeController@getIndex");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\CarTypeController@postStaffEachBase");
        });

        Route::group(['prefix' => 'status'], function (){
            Route::get("/", "Result\StatusController@getIndex");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getCsv");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\StatusController@postStaffEachBase");
        });

        Route::group(['prefix' => 'syaken'], function (){
            Route::get("/", "Result\SyakenController@getIndex");
            Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getCsv");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getIndex");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getMaxMinData");
            Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getPager");
            Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getSearchParams");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getSearch");
            Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getSortParams");
            Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getSortValue");
            Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@getSort");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@postStaffEachBase");
            Route::post("update/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\SyakenController@postUpdate");
        });

        Route::group(['prefix' => 'tenken'], function (){
            Route::get("/", "Result\TenkenController@getIndex");
            Route::get("each-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\TenkenController@getEachStaff");
            Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\TenkenController@getIndex");
            Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\TenkenController@getSearch");
            Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\TenkenController@getInsuranceContactMinData");
            Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}","Result\TenkenController@getMaxMinData");
            Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Result\TenkenController@postStaffEachBase");
        });
    });

    Route::group(['prefix' => 'top'], function (){
        Route::get("/", "Top\GraphController@getIndex");
        Route::get("csv/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getCsv");
        Route::get("index/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getIndex");
        Route::get("insurance-contact-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getInsuranceContactMinData");
        Route::get("max-min-data/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getMaxMinData");
        Route::get("pager/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getPager");
        Route::get("search-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSearchParams");
        Route::get("search/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSearch");
        Route::get("sort-params/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSortParams");
        Route::get("sort-value/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSortValue");
        Route::get("sort/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSort");
        Route::post("staff-each-base/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@postStaffEachBase");
        Route::post("sumary-by-staff/{one?}/{two?}/{three?}/{four?}/{five?}", "Top\GraphController@getSummaryByStaff");
    });

});
