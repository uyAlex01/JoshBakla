<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ActivityController;

Route::get('/search', [EventController::class, 'search'])->name('search');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/search', [EventController::class, 'search'])->name('search');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events', [ActivityController::class, 'index'])->name('activities.index');
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'create_user');
});

/*
|--------------------------------------------------------------------------
| Public Page Routes
|--------------------------------------------------------------------------
*/
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/organize', 'organize')->name('organize');
    Route::get('/pricing', 'pricing')->name('pricing');
});

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/category/{category:slug}', 'show')->name('category.show');
});

/*
|--------------------------------------------------------------------------
| Event Routes
|--------------------------------------------------------------------------
*/
Route::controller(EventController::class)->group(function () {
    Route::get('/browse', 'browse')->name('events.browse');
    Route::get('/events/{event}', 'show')->name('events.show');
    Route::get('/events/upcoming', 'upcoming')->name('events.upcoming');
    Route::get('/events/attended', 'attended')->name('events.attended');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Cart Routes
    Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
});
    
    // Checkout Routes
    Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {
        Route::get('/', 'index')->name('checkout');
        Route::post('/process', 'process')->name('checkout.process');
        Route::get('/success', 'success')->name('checkout.success');
    });
    
    // Ticket Routes
    Route::prefix('tickets')->controller(TicketController::class)->group(function () {
        Route::get('/', 'index')->name('tickets.index');
        Route::get('/{ticket}', 'show')->name('tickets.show');
    });
    
    // Order Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    
    // Wishlist Routes
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    
    // API Routes
    Route::prefix('api')->group(function () {
        Route::get('/dashboard-stats', [DashboardController::class, 'getStats'])->name('api.dashboard.stats');
    });

    // routes/web.php
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/category/{category:slug}', 'show')->name('category.show');
});
    Route::controller(EventController::class)->group(function () {
        Route::get('/browse', 'browse')->name('events.browse');
        Route::get('/events/{event}', 'show')->name('events.show');
        Route::get('/events/upcoming', 'upcoming')->name('events.upcoming');
        Route::get('/events/attended', 'attended')->name('events.attended');
    });
});