<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserEmailSettingController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', 'templates', 301)->name('home');

    Route::resource('templates', TemplateController::class);
    Route::resource('campaigns', CampaignController::class);

    Route::get('email-setting',[UserEmailSettingController::class, 'edit'])->name('email.setting.edit');
    Route::put('email-setting', [UserEmailSettingController::class, 'update'])->name('email.setting.update');

});

