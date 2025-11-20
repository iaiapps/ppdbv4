<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CostCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing')->middleware('guest');

Auth::routes();
Route::middleware('auth')->group(function () {
    // home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/statistic', [HomeController::class, 'statistic'])->name('statistic');

    // admin
    Route::middleware('role:admin')->group(function () {
        Route::prefix('admin')->group(function () {
            // user
            Route::resource('user', UserController::class);
            Route::get('nonactive', [UserController::class, 'nonactiveaccount'])->name('user.nonactive');
            Route::get('all', [UserController::class, 'all'])->name('user.all');

            Route::put('reset-pass', [UserController::class, 'resetpass'])->name('reset.pass');
            //delete user
            Route::post('delete-all', [UserController::class, 'deleteAll'])->name('user.delete.all');

            // student
            Route::resource('student', StudentController::class);
            Route::get('student-all', [StudentController::class, 'studentall'])->name('student.all');
            Route::get('student-export', [StudentController::class, 'exportstudent'])->name('student.export');
            Route::get('re-registrasi', [StudentController::class, 'setreg'])->name('set.reg');
            Route::put('set-cost/{student}', [StudentController::class, 'update_cost'])->name('set.cost');
            Route::get('card', [StudentController::class, 'card'])->name('student.card');
            Route::get('undur-diri', [StudentController::class, 'undurdiri'])->name('student.undur');

            // document
            Route::get('document', [DocumentController::class, 'show'])->name('document.show');
            // delete user bukti pembayaran
            Route::delete('delete-document/{document}', [DocumentController::class, 'destroyDoc'])->name('document.delete');

            // delete user photo
            Route::delete('delete-photo/{document}', [DocumentController::class, 'destroyPhoto'])->name('photo.delete');

            //tombol helper action user
            Route::post('activated', [ActionController::class, 'activated'])->name('user.activated');
            Route::post('notactive', [ActionController::class, 'notactive'])->name('user.notactive');
            //tombol helper action student
            Route::post('accepted', [ActionController::class, 'accepted'])->name('student.accepted');
            Route::post('rejected', [ActionController::class, 'rejected'])->name('student.rejected');
            Route::post('retire', [ActionController::class, 'retire'])->name('student.retire');

            //setting
            Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
            //contact
            Route::get('contact', [SettingController::class, 'contact'])->name('setting.contact');
            Route::get('contact-edit', [SettingController::class, 'contactedit'])->name('setting.contact.edit');
            Route::put('contact', [SettingController::class, 'contactstore'])->name('setting.contact.store');
            // set landing
            Route::get('landset', [SettingController::class, 'landset'])->name('landset.setting');
            Route::get('landset/{id}/edit', [SettingController::class, 'landsetedit'])->name('landset.edit');
            Route::post('landset/{id}/update', [SettingController::class, 'landsetupdate'])->name('landset.update');
            // cost category
            Route::resource('costCategory', CostCategoryController::class);
            // timeline
            Route::resource('timeline', TimelineController::class);

            // payment
            Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
            Route::get('payment/{id}', [PaymentController::class, 'create'])->name('payment.create');
            Route::get('payment-print/{payment}', [PaymentController::class, 'show'])->name('payment.show');
            Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
            Route::get('payment-show/{id}', [PaymentController::class, 'paymentshow'])->name('payment.showall');
            Route::get('payment-photo/{id}', [PaymentController::class, 'paymentphoto'])->name('payment.photo');
            Route::delete('payment-delete/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
            Route::get('paymentall', [PaymentController::class, 'paymentall'])->name('payment.all');
        });
    });

    // buat akun ppdb
    Route::middleware('role:akun_dibuat')->group(function () {
        Route::post('upload', [DocumentController::class, 'store'])->name('upload');
    });

    Route::middleware('role:akun_aktif|akun_isi_formulir|akun_diterima|akun_ditolak|akun_mengundurkan_diri')->group(function () {
        // Route::prefix('student')->group(function () {
        // Route::get('upload_foto', [DocumentController::class, 'create'])->name('upload_foto');
        // Route::post('upload_foto', [DocumentController::class, 'store'])->name('upload_foto');

        Route::get('student-home', [StudentController::class, 'home'])->name('student.home');
        Route::get('student-profil', [StudentController::class, 'studentprofil'])->name('student.profile');
        Route::get('student-timeline', [TimelineController::class, 'showtimeline'])->name('student.timeline');
        Route::resource('student', StudentController::class)->only(['create', 'store']);
        Route::get('student-cost', [StudentController::class, 'studentcost'])->name('student.cost');

        // Route::get('student', [StudentController::class, 'isiform'])->name('isiform');
        // });
    });
});
