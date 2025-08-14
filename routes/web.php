<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::middleware(LangMiddleware::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::post('/', [authController::class, 'login']);
        Route::get('/', [UserController::class, 'home'])->name('guest');
        Route::get('/DocBooker/Guest/appointment', [UserController::class, 'appointment'])->name('appointmentGuest');
        Route::get('/DocBooker/Guest/clinic', [UserController::class, 'clinic'])->name('clinicGuest');
        Route::get('/DocBooker/Guest/contactUs', [UserController::class, 'contactUs'])->name('contactUsGuest');
        Route::get('/DocBooker/Guest/Doctor', [UserController::class, 'Doctor'])->name('DoctorGuest');
    });

    Route::post('/DocBooker/contactUs', [UserController::class, 'message'])->name('message');

    Route::middleware('auth')->group(function () {
        Route::get('/DocBooker', [UserController::class, 'home'])->name('auth');
        Route::post('/logout', [authController::class, 'logout'])->name('logout');
        Route::get('/DocBooker/appointment', [UserController::class, 'appointment'])->name('appointment');
        Route::get('/DocBooker/clinic', [UserController::class, 'clinic'])->name('clinic');
        Route::get('/DocBooker/contactUs', [UserController::class, 'contactUs'])->name('contactUs');
        Route::get('/DocBooker/Doctor', [UserController::class, 'Doctor'])->name('Doctor');

        // appointment options
        Route::post('/DocBooker/appointment/days/{dateDisplayed}', [UserController::class, 'dayAppointments'])->name('dayAppointments');
        Route::post('/DocBooker/appointment/weeks/{dateDisplayed}', [UserController::class, 'WeekAppointments'])->name('WeekAppointments');

        Route::post('/DocBooker/booking/{id}/{date}', [UserController::class, 'booking'])->name('booking');
    });

    Route::get('changeLang/{locale}', [UserController::class, 'changeLang'])->name('changeLang');

    Route::middleware('auth', DoctorMiddleware::class)->group(function () {
        // add patient
        Route::get('/DocBooker/dashboard/addPatient', [dashboardController::class, 'addPatient'])->name('dashboard');
        Route::post('/DocBooker/dashboard/addPatient', [authController::class, 'addPatient'])->name('addPatient');

        // search
        Route::get('/DocBooker/dashboard/search', [dashboardController::class, 'search'])->name('search');
        Route::post('/DocBooker/dashboard/getSearch', [dashboardController::class, 'getSearch'])->name('getSearch');
        Route::post('/DocBooker/dashboard/getAllUser', [dashboardController::class, 'getAllUser'])->name('getAllUser');

        // edit
        Route::get('/DocBooker/dashboard/search/edit/{id}', [dashboardController::class, 'editPage'])->name('editPage');
        Route::post('/DocBooker/dashboard/search/editInfo/{id}', [dashboardController::class, 'editActionInfo'])->name('editActionInfo');
        Route::post('/DocBooker/dashboard/search/editPass/{id}', [dashboardController::class, 'editActionPass'])->name('editActionPass');
        Route::get('/DocBooker/dashboard/search/delete/{id}', [dashboardController::class, 'deletePage'])->name('deletePage');
        Route::delete('/DocBooker/dashboard/search/delete/{id}', [dashboardController::class, 'deleteAction'])->name('deleteAction');

        // message
        Route::get('/DocBooker/dashboard/messages', [dashboardController::class, 'messages'])->name('messages');

        // profile
        Route::get('/DocBooker/dashboard/profile', [dashboardController::class, 'profile'])->name('profile');
        Route::post('/DocBooker/dashboard/profile', [dashboardController::class, 'updateInformation'])->name('updateInfo');
        Route::get('/DocBooker/dashboard/profile/security', [dashboardController::class, 'security'])->name('security');
        Route::post('/DocBooker/dashboard/profile/security', [dashboardController::class, 'changePass'])->name('changePass');

        // appointment options
        Route::get('/DocBooker/dashboard/appointment', [dashboardController::class, 'DashAppointment'])->name('DashAppointment');
        Route::post('/DocBooker/dashboard/appointment/days/{dateDisplayed}', [dashboardController::class, 'getAppointments'])->name('getAppointments');
        Route::post('/DocBooker/dashboard/appointment/weeks/{dateDisplayed}', [dashboardController::class, 'getWeekAppointments'])->name('getWeekAppointments');

        Route::post('/DocBooker/dashboard/makeAppointment', [dashboardController::class, 'makeAppointment'])->name('makeAppointment');
        Route::post('/DocBooker/dashboard/updateAppointment/{id}', [dashboardController::class, 'updateAppointment'])->name('updateAppointment');
        Route::delete('/DocBooker/dashboard/deleteAppointment/{id}', [dashboardController::class, 'deleteAppointment'])->name('deleteAppointment');
    });
});
