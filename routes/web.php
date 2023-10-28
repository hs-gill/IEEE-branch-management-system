<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,               // Not needed. Delete for deployment
        'phpVersion' => PHP_VERSION,                            // Not needed. Delete for deployment
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    /*
     * Routes for the View Controllers.
     */
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');;


    /*
     * Generate a route for all the methods inside the Controllers for Resource Models.
     */
    Route::resources([
        'events' => EventController::class,
        'feedbacks' => FeedbackController::class,
        'items' => ItemController::class,
        'transactions' => TransactionController::class,
        'users' => UserController::class
    ]);

    Route::get('/privacy-policy', function () {
        return Inertia::render('Pages/PrivacyPolicy/main');
    })->name('privacy-policy');


    /*
     * In case a route doesn't exist.
     * This Route has to be at the end in order to read first the other routes.
     */
    Route::get('/{any?}', function() {
        // TOOD: Create an error 404 page.
        return Inertia::render('Dashboard');            // Insert the route of the Error page here.
    })->where('any', '.*');

});
