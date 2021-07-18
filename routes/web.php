<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\user_master\UserMasterController;
use App\Http\Controllers\admin\company_master\CompanyMasterController;
use App\Http\Controllers\admin\languages_master\LanguagesMasterController;
use App\Http\Controllers\admin\channel_genre_master\ChannelGenreMasterController;
use App\Http\Controllers\admin\program_genre_master\ProgramGenreMasterController;
use App\Http\Controllers\admin\program_sub_genre_master\ProgramSubGenreMasterController;
use App\Http\Controllers\admin\channel_master\ChannelMasterController;
use App\Http\Controllers\admin\contact_master\ContactMasterController;
use App\Http\Controllers\admin\program_master_add\ProgramMasterAddController;
use App\Http\Controllers\admin\operator_master\OperatorMasterAddController;
use App\Http\Controllers\admin\Master\OtherInfoMaster\OtherInfoMasterController;

use App\Http\Controllers\admin\programmes\ProgramMasterController;
use App\Http\Controllers\admin\programmes\ProgramCenterController;
use App\Http\Controllers\admin\programmes\HighlightsController;
use App\Http\Controllers\admin\programmes\DummyScheduleController;
use App\Http\Controllers\admin\programmes\ChannelGuideController;
use App\Http\Controllers\admin\programmes\OTTController;
use App\Http\Controllers\admin\programmes\MovieShowsController;


use App\Http\Controllers\admin\upload\UploadMenuController;
use App\Http\Controllers\admin\view\ViewMenuController;

use App\Http\Controllers\front\FrontController;

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

Route::get('clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');

    return "Cleared!";

 });


// Route::get('/', [AuthController::class, 'showLoginForm']);

Route::get('/', [FrontController::class, 'home']);
Route::post('settimezone', [HomeController::class, 'settimezone'])->name('settimezone');
// Route::get('404notfound', 'admin\HomeController@notFound')->name('404notfound');
// Route::get('500error', 'admin\HomeController@exceptions')->name('500error');
// Route::get('401unauthorized', 'admin\HomeController@unauthorized')->name('401unauthorized');

Route::prefix('admin')->group(function(){

    // ADMIN LOGIN SECTION START
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    // ADMIN PASSWORD SECTION START
    Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('admin.forgotpassword');
    Route::get('forgot-password/{token}', [AuthController::class, 'showPasswordResetForm'])->name('admin.resetpasswordform');
    Route::post('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('admin.passwordreset');
    Route::get('verification', [AuthController::class, 'verification'])->name('admin.verification');
    Route::post('resetpasswordemail', [AuthController::class, 'resetpasswordemail'])->name('admin.resetpasswordemail');

    //------------ ADMIN DASHBOARD & PROFILE SECTION START ------------
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    //------------ ADMIN DASHBOARD & PROFILE SECTION END------------

    /* ----- Masters Menu ----- */

    // User Master
    Route::prefix('user_master')->group(function(){
        Route::get('add-listing', [UserMasterController::class, 'index'])->name('admin.user_master.index');
        Route::post('add-store', [UserMasterController::class, 'store'])->name('admin.user_master.store');
        Route::post('change-status', [UserMasterController::class, 'changeStatus'])->name('admin.user_master.changeStatus');
        Route::delete('user_delete_modal/{id}',[UserMasterController::class, 'destroy'])->name('admin.user_master.delete');
        Route::post('getusers',[UserMasterController::class, 'postUsersList'])->name('admin.user_master.getusers'); //listing User Master
    });

    // Company Master
    Route::prefix('company_master')->group(function(){
        Route::get('add-listing', [CompanyMasterController::class, 'index'])->name('admin.company_master.index');
        Route::post('add-store', [CompanyMasterController::class, 'store'])->name('admin.company_master.store');
        Route::delete('company_delete_modal/{id?}',[CompanyMasterController::class, 'destroy'])->name('admin.company_master.delete');
        Route::post('getcompany',[CompanyMasterController::class, 'postCompnayList'])->name('admin.company_master.getcompany'); //listing Company Master
    });



    //Language Master
    Route::prefix('languages_master')->group(function(){
        Route::get('add-listing', [LanguagesMasterController::class, 'index'])->name('admin.languages_master.index');
        Route::post('add-store', [LanguagesMasterController::class, 'store'])->name('admin.languages_master.store');
        Route::delete('languages_delete_modal/{id}',[LanguagesMasterController::class, 'destroy'])->name('admin.languages_master.delete');
        Route::post('getlanguages',[LanguagesMasterController::class, 'postLanguagesList'])->name('admin.languages_master.getlanguages'); //listing Language Master
    });

    //Channel Genre Master
    Route::prefix('channel_genre_master')->group(function(){
        Route::get('add-listing', [ChannelGenreMasterController::class, 'index'])->name('admin.channel_genre_master.index');
        Route::post('add-store', [ChannelGenreMasterController::class, 'store'])->name('admin.channel_genre_master.store');
        Route::delete('channel_genre_delete_modal/{id}',[ChannelGenreMasterController::class, 'destroy'])->name('admin.channel_genre_master.delete');
        Route::post('getchannelgenre',[ChannelGenreMasterController::class, 'postChannelGenreList'])->name('admin.channel_genre_master.getchannelgenre'); //listing Channel Genre Master
    });

    //Program Genre Master
    Route::prefix('program_genre_master')->group(function(){
        Route::get('add-listing', [ProgramGenreMasterController::class, 'index'])->name('admin.program_genre_master.index');
        Route::post('add-store', [ProgramGenreMasterController::class, 'store'])->name('admin.program_genre_master.store');
        Route::delete('program_delete_modal/{id}',[ProgramGenreMasterController::class, 'destroy'])->name('admin.program_genre_master.delete');
        Route::post('getpostchannelgenre',[ProgramGenreMasterController::class, 'postProgramChannelGenreList'])->name('admin.program_genre_master.getpostchannelgenre'); //listing Program Genre Master
    });

    //Program Sub-Genre Master
    Route::prefix('program_sub_genre_master')->group(function(){
        Route::get('add-listing', [ProgramSubGenreMasterController::class, 'index'])->name('admin.program_sub_genre_master.index');
        Route::post('add-store', [ProgramSubGenreMasterController::class, 'store'])->name('admin.program_sub_genre_master.store');
        Route::delete('program_sub_delete_modal/{id}',[ProgramSubGenreMasterController::class, 'destroy'])->name('admin.program_sub_genre_master.delete');
        Route::post('getpostsubchannelgenre',[ProgramSubGenreMasterController::class, 'postProgramSubChannelGenreList'])->name('admin.program_sub_genre_master.getpostsubchannelgenre'); //listing Program Sub Genre Master
    });

    //Channel Master
    Route::prefix('channel_master')->group(function(){
        Route::get('add-listing', [ChannelMasterController::class, 'index'])->name('admin.channel_master.index');
        Route::post('add-store', [ChannelMasterController::class, 'store'])->name('admin.channel_master.store');
        Route::delete('channel_delete_modal/{id}',[ChannelMasterController::class, 'destroy'])->name('admin.channel_master.delete');
        Route::get('channel_view_modal/{id}', [ChannelMasterController::class, 'show'])->name('admin.channel_master.show');
        Route::post('getpostchannel',[ChannelMasterController::class, 'postChannelList'])->name('admin.channel_master.getpostchannel'); //listing Channel Master
    });

    //Program Master
    Route::prefix('program_master_add')->group(function(){
        Route::get('add-listing', [ProgramMasterAddController::class, 'index'])->name('admin.program_master_add.index');
        Route::post('add-store', [ProgramMasterAddController::class, 'store'])->name('admin.program_master_add.store');
        Route::delete('program_add_delete_modal/{id}',[ProgramMasterAddController::class, 'destroy'])->name('admin.program_master_add.delete');
        Route::post('getpostprogram',[ProgramMasterAddController::class, 'postProgramList'])->name('admin.program_master_add.getpostprogram'); //listing Program Master
    });

    Route::prefix('other_info_master')->group(function(){
        Route::get('add-listing',[OtherInfoMasterController::class,'index'])->name('admin.other_info_master_add.index');
    });

    //Operator Master
    Route::prefix('operator_master')->group(function(){
        Route::get('add-listing', [OperatorMasterAddController::class, 'index'])->name('admin.operator_master.index');
        Route::post('add-store', [OperatorMasterAddController::class, 'store'])->name('admin.operator_master.store');
        Route::delete('operator_add_delete_modal/{id}',[OperatorMasterAddController::class, 'destroy'])->name('admin.operator_master.delete');
        Route::post('getpostoperator',[OperatorMasterAddController::class, 'postOperatorList'])->name('admin.operator_master.getpostoperator'); //listing Operator Master
    });

    //Contact Master
    Route::prefix('contact_master')->group(function(){
        Route::get('add-listing', [ContactMasterController::class, 'index'])->name('admin.contact_master.index');
        Route::post('add-store', [ContactMasterController::class, 'store'])->name('admin.contact_master.store');
        Route::delete('contact_delete_modal/{id}',[ContactMasterController::class, 'destroy'])->name('admin.contact_master.delete');
        Route::post('getpostcontact',[ContactMasterController::class, 'postContactList'])->name('admin.contact_master.getpostcontact'); //listing Contact Master
    });


    /* ----- Programmes Menu ----- */

    //Program Master
    Route::prefix('program_master')->group(function(){
        Route::get('add-listing', [ProgramMasterController::class, 'index'])->name('admin.program_master.index');
    });

    //Program Center
    Route::prefix('program_center')->group(function(){
        Route::get('add-listing', [ProgramCenterController::class, 'index'])->name('admin.program_center.index');
    });

    //Highlights
    Route::prefix('highlights')->group(function(){
        Route::get('add-listing', [HighlightsController::class, 'index'])->name('admin.highlights.index');
    });

    //Dummy Schedule
    Route::prefix('dummy_schedule')->group(function(){
        Route::get('add-listing', [DummyScheduleController::class, 'index'])->name('admin.dummy_schedule.index');
    });

    //Channel Guide
    Route::prefix('channel_guide')->group(function(){
        Route::get('add-listing', [ChannelGuideController::class, 'index'])->name('admin.channel_guide.index');
        Route::post('add-store', [ChannelGuideController::class, 'store'])->name('admin.channel_guide.store');
        Route::delete('channel_guide_delete_modal/{id}',[ChannelGuideController::class, 'destroy'])->name('admin.channel_guide.delete');
        Route::post('getpostchannelguide',[ChannelGuideController::class, 'postChannelGuideList'])->name('admin.channel_guide.getpostchannelguide'); //listing Channel Guide
    });

    //OTT
    Route::prefix('ott')->group(function(){
        Route::get('add-listing', [OTTController::class, 'index'])->name('admin.ott.index');
    });

    //Movie Shows
    Route::prefix('movie_shows')->group(function(){
        Route::get('add-listing', [MovieShowsController::class, 'index'])->name('admin.movie_shows.index');
    });

    /* ----- Upload Menu ----- */
    Route::prefix('upload_menu')->group(function(){
        Route::get('add-listing', [UploadMenuController::class, 'index'])->name('admin.upload_menu.index');
        Route::post('add-store', [UploadMenuController::class, 'store'])->name('admin.upload_menu.store');
        Route::get('add-listing/nautocomplete', [UploadMenuController::class, 'autocomplete'])->name('nautocomplete');
        Route::post('getuploadmenu',[UploadMenuController::class, 'postUploadMenuList'])->name('admin.upload_menu.getuploadmenu'); // listing Upload Menu
        Route::get('add_excel_program/add/{id}', [UploadMenuController::class, 'addExcelProgram'])->name('admin.upload_menu.add_excel_program'); // Add Button
        Route::get('add_excel_program/update/{id}', [UploadMenuController::class, 'updateExcelProgram'])->name('admin.upload_menu.update_excel_program'); // Update Button
    });

    /* ----- View Menu ----- */
    Route::prefix('view_menu')->group(function(){
        Route::get('add-listing', [ViewMenuController::class, 'index'])->name('admin.view_menu.index');
    });

});
