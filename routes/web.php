<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\TrendController;

Route::prefix('admin')
    ->as('admin.')
    ->namespace ('Admin')
    ->group(function () {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
        Route::post('login', 'Auth\LoginController@login')->name('login');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    });

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth:admin'])
    ->namespace ('Admin')
    ->group(function () {
        Route::get('/', [FieldController::class, 'index'])->name('home');

        Route::post('/crawl-keywords/import', 'CrawlKeywordController@postImport')->name('crawl-keywords.postImport');

        Route::resources([
            'admin-keywords' => 'AdminKeywordController',
            'reviewers' => 'ReviewerController',
            'crawl-keywords' => 'CrawlKeywordController',
            'crawl-posts' => 'CrawlPostController',
            "fields" => 'FieldController',
            "shops" => 'ShopController',
            "trends" => "TrendController",
            "categories-of-fields" => "CategoryOfFieldController"
        ]);
    });

Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('trend', [TrendController::class, 'index'])->name('product-cate');
Route::get('discount', [DiscountController::class, 'index'])->name('discount');




