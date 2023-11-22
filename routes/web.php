<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TextbookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
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

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/role-user', [AdminController::class, 'updateRole'])->name('role-user.update');
    Route::put('/permission-role', [AdminController::class, 'updatePermission'])->name('permission-role.update');
    Route::put('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add-to-cart');
    Route::put('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove-from-cart');
    Route::put('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    /*
     * Generate a route for all the methods inside the Controllers for Resource Models.
     */
    Route::resources([
        'events' => EventController::class,
        'feedbacks' => FeedbackController::class,
        'items' => ItemController::class,
        'orders' => OrderController::class,
        'roles' => RoleController::class,
        'textbooks' => TextbookController::class,
        'transactions' => TransactionController::class,
        'users' => UserController::class,
        'volunteers' => VolunteerController::class
    ]);

    Route::get('/privacy-policy', function () {
        return Inertia::render('PrivacyPolicy/Main');
    })->name('privacy-policy');

    Route::get('/contact-us', function () {
        return Inertia::render('Contact');
    })->name('contact-us');


    /*
     * In case a route doesn't exist.
     * This Route has to be at the end in order to read first the other routes.
     */
    Route::get('/{any?}', function() {
        // TOOD: Create an error 404 page.
        return Inertia::render('Dashboard');            // Insert the route of the Error page here.
    })->where('any', '.*');

});
