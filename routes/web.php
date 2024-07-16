<?php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CenterAdController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'register'])->middleware('guest');

// User Login
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('user.login');
Route::post('logout', [LoginController::class, 'logout'])->name('user.logout');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// Front-Posts
Route::get('/posts/{slug}', [PostController::class, 'show'])->middleware('count.views')->name('posts.show');

Route::middleware('auth')->prefix('admin/posts')->name('admin.')->group(function () {
    Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/pending', [CommentController::class, 'pending'])->name('comments.pending');
    Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::patch('/comments/{comment}/disapprove', [CommentController::class, 'disapprove'])->name('comments.disapprove');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');
});
Route::post('admin/posts/{post}/store', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
// Management UI - Only accessible by admin users
Route::middleware(['auth', 'check.role'])->group(function () {

    Route::get('admin/dashboard', [BackendController::class, 'index'])->name('admin.dashboard');

    // Settings
    Route::get('admin/settings/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::patch('admin/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');

    // Contact settings
    Route::get('admin/contact/index', [ContactController::class, 'edit'])->name('admin.contact.index');
    Route::patch('admin.contact.update', [ContactController::class, 'update'])->name('admin.contact.update');

    // Slides
    Route::get('admin/slide/create', [SlideController::class, 'create'])->middleware('permission:manage slideshows')->name('admin.slide.create');
    Route::post('admin/slide/store', [SlideController::class, 'store'])->middleware('permission:manage slideshows')->name('admin.slide.store');
    Route::get('admin/slide/index', [SlideController::class, 'index'])->middleware('permission:manage slideshows')->name('admin.slide.index');
    Route::get('admin/slide/edit/{slide}', [SlideController::class, 'edit'])->middleware('permission:manage slideshows')->name('admin.slide.edit');
    Route::patch('admin/slide/update/{slide}', [SlideController::class, 'update'])->name('admin.slide.update');
    Route::delete('admin/slide/destroy/{slide}', [SlideController::class, 'destroy'])->middleware('permission:manage slideshows')->name('admin.slide.destroy');
    Route::patch('admin/slide/toggleActive/{slide}', [SlideController::class, 'toggleActive'])->middleware('permission:manage slideshows')->name('admin.slide.toggleActive');

    // CenterAds
    Route::get('admin/centerads/create', [CenterAdController::class, 'create'])->name('admin.centerads.create');
    Route::post('admin/centerads/store', [CenterAdController::class, 'store'])->name('admin.centerads.store');
    Route::get('admin/centerads/index', [CenterAdController::class, 'index'])->name('admin.centerads.index');
    Route::get('admin/centerads/edit/{centerad}', [CenterAdController::class, 'edit'])->name('admin.centerads.edit');
    Route::patch('admin/centerads/toggleActive/{centerad}', [CenterAdController::class, 'toggleActive'])->name('admin.centerads.toggleActive');
    Route::patch('admin/centerads/update/{centerad}', [CenterAdController::class, 'update'])->name('admin.centerads.update');
    Route::delete('admin/centerads/delete/{centerad}', [CenterAdController::class, 'destroy'])->name('admin.centerads.delete');

    // Users
    Route::get('admin/users/index', [UserController::class, 'index'])->middleware('permission:manage users')->name('admin.user.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->middleware('permission:manage users')->name('admin.users.create');
    Route::post('admin/users/store', [UserController::class, 'store'])->middleware('permission:manage users')->name('admin.users.store');
    Route::get('admin/users/edit/{user}', [UserController::class, 'edit'])->middleware('permission:manage users')->name('admin.users.edit');
    Route::patch('admin/users/update/{user}', [UserController::class, 'update'])->middleware('permission:manage users')->name('admin.users.update');
    Route::delete('admin/users/delete/{user}', [UserController::class, 'destroy'])->middleware('permission:manage users')->name('admin.users.delete');

    // Assign Roles to Users
    Route::get('admin/users/{user}/assign-roles', [UserController::class, 'showAssignRolesForm'])->middleware('permission:manage users')->name('admin.users.showAssignRolesForm');
    Route::patch('admin/users/{user}/assign-roles', [UserController::class, 'assignRoles'])->middleware('permission:manage users')->name('admin.users.assignRoles');

    // Assign Permissions to Roles
    Route::get('admin/roles/{role}/assign-permissions', [PermissionController::class, 'showAssignPermissionsForm'])->name('admin.roles.showAssignPermissionsForm');
    Route::patch('admin/roles/{role}/assign-permissions', [PermissionController::class, 'assignPermissionsToRole'])->name('admin.roles.assignPermissions');


    // Roles
    Route::get('admin/roles/index', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('admin/roles/edit/{role}', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::patch('admin/roles/update/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('admin/roles/delete/{role}', [RoleController::class, 'destroy'])->name('admin.roles.delete');

    // Permissions
    Route::get('admin/permissions/index', [PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::get('admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('admin/permissions/store', [PermissionController::class, 'store'])->name('admin.permissions.store');
    Route::get('admin/permissions/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.permissions.edit');
    Route::patch('admin/permissions/update/{permission}', [PermissionController::class, 'update'])->name('admin.permissions.update');
    Route::delete('admin/permissions/delete/{permission}', [PermissionController::class, 'destroy'])->name('admin.permissions.delete');



    // Categories
    Route::get('admin/categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Posts
    Route::get('admin/posts/index', [PostController::class, 'index'])->name('posts.index');
    Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('admin/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('admin/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
Route::get('/posts', [HomeController::class, 'list_posts'])->name('posts.index');
Route::get('/articles', [HomeController::class, 'list_articles'])->name('articles');

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'register'])->middleware('guest');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware('auth')->name('verification.resend');

Route::prefix('admin')->middleware('auth')->group(function () {
    // روت‌های مدیریت روزها
    Route::get('days/index', [DayController::class, 'index'])->name('admin.days.index');
    Route::get('days/create', [DayController::class, 'create'])->name('admin.days.create');
    Route::post('days', [DayController::class, 'store'])->name('admin.days.store');
    Route::get('days/{day}', [DayController::class, 'show'])->name('admin.days.show');
    Route::get('days/{day}/edit', [DayController::class, 'edit'])->name('admin.days.edit');
    Route::patch('days/{day}', [DayController::class, 'update'])->name('admin.days.update');
    Route::delete('days/{day}', [DayController::class, 'destroy'])->name('admin.days.destroy');

    // روت‌های مدیریت بازه‌های زمانی
    Route::get('time_slots/index', [TimeSlotController::class, 'index'])->name('admin.time_slots.index');
    Route::get('time_slots/create', [TimeSlotController::class, 'create'])->name('admin.time_slots.create');
    Route::post('time_slots', [TimeSlotController::class, 'store'])->name('admin.time_slots.store');
    Route::get('time_slots/{time_slot}', [TimeSlotController::class, 'show'])->name('admin.time_slots.show');
    Route::get('time_slots/{time_slot}/edit', [TimeSlotController::class, 'edit'])->name('admin.time_slots.edit');
    Route::patch('time_slots/{time_slot}', [TimeSlotController::class, 'update'])->name('admin.time_slots.update');
    Route::delete('time_slots/{time_slot}', [TimeSlotController::class, 'destroy'])->name('admin.time_slots.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    // روت‌های مدیریت مشاوره‌ها
    Route::get('consultations/index', [ConsultationController::class, 'index'])->name('admin.consultations.index');
    Route::get('consultations/create', [ConsultationController::class, 'create'])->name('admin.consultations.create');
    Route::post('consultations/store', [ConsultationController::class, 'store'])->name('admin.consultations.store');
    Route::get('consultations/{consultation}', [ConsultationController::class, 'show'])->name('consultations.show');
    Route::get('consultations/{consultation}/edit', [ConsultationController::class, 'edit'])->name('admin.consultations.edit');
    Route::patch('consultations/{consultation}', [ConsultationController::class, 'update'])->name('admin.consultations.update');
    Route::delete('consultations/{consultation}', [ConsultationController::class, 'destroy'])->name('admin.consultations.destroy');

    Route::get('reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::delete('reservations/{id}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('reservations/{reservation}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
});
Route::prefix('user/')->middleware('auth')->group(function () {
    Route::get('reservations/reserved', [ReservationController::class, 'userReservations'])->name('user.reservations.reserved');
    Route::get('/reservations/{id}/pay', [ReservationController::class, 'pay'])->name('reservations.pay');
    Route::get('/reservations/callback/{id}', [ReservationController::class, 'callback'])->name('reservations.callback');
});

use App\Http\Controllers\ArticleController;

Route::prefix('admin')->group(function () {
    Route::get('articles/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});


Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

use App\Http\Controllers\PageController;

Route::middleware(['auth'])->group(function () {
    // Routes for PageController
    Route::get('admin/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('admin/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('admin/pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('admin/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('admin/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('admin/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');
    Route::get('pages/{slug}', [PageController::class, 'show'])->name('pages.show');
});
