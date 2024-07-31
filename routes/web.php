<?php

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ClientSectionController;
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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WhoWeAreController;
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
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
// Route::post('register', [RegisterController::class, 'register'])->middleware('guest');
// User Login
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('user.login');
Route::post('logout', [LoginController::class, 'logout'])->name('user.logout');

// Posts And Articles
Route::get('/posts/{slug}', [PostController::class, 'show'])->middleware('count.views')->name('posts.show');
Route::get('/posts', [HomeController::class, 'list_posts'])->name('posts.index');
Route::get('/articles', [HomeController::class, 'list_articles'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

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

// User Login Comment
Route::post('posts/{post}/store', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

//pages
Route::get('pages/{slug}', [PageController::class, 'show'])->name('pages.show');

//testimonials
Route::get('testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show');

//lfm
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::middleware(['auth'])->group(function () {
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('reservations/{reservation}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
    Route::patch('/profile', [RegisterController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
});

Route::prefix('user/')->middleware(['auth'])->group(function () {
    Route::get('reservations/reserved', [ReservationController::class, 'userReservations'])->name('user.reservations.reserved');
    Route::get('/reservations/{id}/pay', [ReservationController::class, 'pay'])->name('reservations.pay');
    Route::get('/reservations/callback/{id}', [ReservationController::class, 'callback'])->name('reservations.callback');
});

//feedback
Route::middleware(['auth'])->group(function () {
    // Route::get('/feedback/{Consultation_id}', function ($session_id) {
    //     return view('feedback', ['Consultation_id' => $session_id]);
    // })->name('feedback.form');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

//Help
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/help/settings', [HelpController::class, 'settings'])->name('help.settings')->middleware('permission:manage help settings');
});
Route::middleware(['auth'])->group(function () {
    Route::get('admin/reservations/{id}/set_status', [ReservationController::class, 'setStatus'])->name('admin.reservations.setStatus');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/posts')->name('admin.')->group(function () {
        Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index')->middleware('permission:manage comments');
        Route::get('/comments/pending', [CommentController::class, 'pending'])->name('comments.pending');
        Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
        Route::patch('/comments/{comment}/disapprove', [CommentController::class, 'disapprove'])->name('comments.disapprove');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete')->middleware('permission:manage comments delete');
    });

    // Management UI - Only accessible by admin users


    Route::get('admin/dashboard', [BackendController::class, 'index'])->middleware('permission:dashboard')->name('admin.dashboard');

    // Settings
    Route::get('admin/settings/edit', [SettingController::class, 'edit'])->name('admin.settings.edit')->middleware('permission:manage settings SEO');
    Route::patch('admin/settings/update', [SettingController::class, 'update'])->name('admin.settings.update')->middleware('permission:manage settings SEO');

    // Contact settings
    Route::get('admin/contact/index', [ContactController::class, 'edit'])->name('admin.contact.index')->middleware('permission:manage settings general');
    Route::patch('admin.contact.update', [ContactController::class, 'update'])->name('admin.contact.update')->middleware('permission:manage settings general');

    // Slides
    Route::get('admin/slide/create', [SlideController::class, 'create'])->middleware('permission:manage slideshows add')->name('admin.slide.create');
    Route::post('admin/slide/store', [SlideController::class, 'store'])->middleware('permission:manage slideshows')->name('admin.slide.store');
    Route::get('admin/slide/index', [SlideController::class, 'index'])->middleware('permission:manage slideshows list')->name('admin.slide.index');
    Route::get('admin/slide/edit/{slide}', [SlideController::class, 'edit'])->middleware('permission:manage slideshows edit')->name('admin.slide.edit');
    Route::patch('admin/slide/update/{slide}', [SlideController::class, 'update'])->name('admin.slide.update');
    Route::delete('admin/slide/destroy/{slide}', [SlideController::class, 'destroy'])->middleware('permission:manage slideshows delete')->name('admin.slide.destroy');
    Route::patch('admin/slide/toggleActive/{slide}', [SlideController::class, 'toggleActive'])->middleware('permission:manage slideshows')->name('admin.slide.toggleActive')->middleware('permission:manage slideshows');

    // CenterAds
    Route::get('admin/centerads/create', [CenterAdController::class, 'create'])->name('admin.centerads.create')->middleware('permission:manage centerads add');
    Route::post('admin/centerads/store', [CenterAdController::class, 'store'])->name('admin.centerads.store');
    Route::get('admin/centerads/index', [CenterAdController::class, 'index'])->name('admin.centerads.index')->middleware('permission:manage centerads list');
    Route::get('admin/centerads/edit/{centerad}', [CenterAdController::class, 'edit'])->name('admin.centerads.edit')->middleware('permission:manage centerads edit');
    Route::patch('admin/centerads/toggleActive/{centerad}', [CenterAdController::class, 'toggleActive'])->name('admin.centerads.toggleActive');
    Route::patch('admin/centerads/update/{centerad}', [CenterAdController::class, 'update'])->name('admin.centerads.update');
    Route::delete('admin/centerads/delete/{centerad}', [CenterAdController::class, 'destroy'])->name('admin.centerads.delete')->middleware('permission:manage centerads delete');

    // Users
    Route::get('admin/users/index', [UserController::class, 'index'])->middleware('permission:manage users')->name('admin.user.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->middleware('permission:manage users add')->name('admin.users.create');
    Route::post('admin/users/store', [UserController::class, 'store'])->middleware('permission:manage users')->name('admin.users.store');
    Route::get('admin/users/edit/{user}', [UserController::class, 'edit'])->middleware('permission:manage users edit')->name('admin.users.edit');
    Route::patch('admin/users/update/{user}', [UserController::class, 'update'])->middleware('permission:manage users')->name('admin.users.update');
    Route::delete('admin/users/delete/{user}', [UserController::class, 'destroy'])->middleware('permission:manage users delete')->name('admin.users.delete');

    // // Assign Roles to Users
    // Route::get('admin/users/{user}/assign-roles', [UserController::class, 'showAssignRolesForm'])->middleware('permission:manage users')->name('admin.users.showAssignRolesForm');
    // Route::patch('admin/users/{user}/assign-roles', [UserController::class, 'assignRoles'])->middleware('permission:manage users')->name('admin.users.assignRoles');

    // // Assign Permissions to Roles
    // Route::get('admin/roles/{role}/assign-permissions', [PermissionController::class, 'showAssignPermissionsForm'])->name('admin.roles.showAssignPermissionsForm');
    // Route::patch('admin/roles/{role}/assign-permissions', [PermissionController::class, 'assignPermissionsToRole'])->name('admin.roles.assignPermissions');


    // Roles
    Route::get('admin/roles/index', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('permission:manage roles list');
    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('permission:manage roles add');
    Route::post('admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('permission:manage roles');
    Route::get('admin/roles/edit/{role}', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('permission:manage roles edit');
    Route::patch('admin/roles/update/{role}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('permission:manage roles');
    Route::delete('admin/roles/delete/{role}', [RoleController::class, 'destroy'])->name('admin.roles.delete')->middleware('permission:manage roles delete');

    // Permissions
    Route::get('admin/permissions/index', [PermissionController::class, 'index'])->name('admin.permissions.index')->middleware('permission:manage permissions list');
    Route::get('admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create')->middleware('permission:manage permissions add');
    Route::post('admin/permissions/store', [PermissionController::class, 'store'])->name('admin.permissions.store')->middleware('permission:manage permissions');
    Route::get('admin/permissions/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.permissions.edit')->middleware('permission:manage permissions edit');
    Route::patch('admin/permissions/update/{permission}', [PermissionController::class, 'update'])->name('admin.permissions.update')->middleware('permission:manage permissions');
    Route::delete('admin/permissions/delete/{permission}', [PermissionController::class, 'destroy'])->name('admin.permissions.delete')->middleware('permission:manage permissions delete');



    // Categories
    Route::get('admin/categories/index', [CategoryController::class, 'index'])->name('categories.index')->middleware('permission:manage categories list');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('permission:manage categories add');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('categories.store')->middleware('permission:manage categories');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('permission:manage categories edit');
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('permission:manage categories');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('permission:manage categories delete');

    // Posts
    Route::get('admin/posts/index', [PostController::class, 'index'])->name('posts.index')->middleware('permission:manage posts list');
    Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:manage posts add');
    Route::post('admin/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('permission:manage posts');
    Route::get('admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('permission:manage posts edit');
    Route::put('admin/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('permission:manage posts');
    Route::delete('admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('permission:manage posts delete');




    Route::prefix('admin')->group(function () {
        // // روت‌های مدیریت روزها
        // Route::get('days/index', [DayController::class, 'index'])->name('admin.days.index');
        // Route::get('days/create', [DayController::class, 'create'])->name('admin.days.create');
        // Route::post('days', [DayController::class, 'store'])->name('admin.days.store');
        // Route::get('days/{day}', [DayController::class, 'show'])->name('admin.days.show');
        // Route::get('days/{day}/edit', [DayController::class, 'edit'])->name('admin.days.edit');
        // Route::patch('days/{day}', [DayController::class, 'update'])->name('admin.days.update');
        // Route::delete('days/{day}', [DayController::class, 'destroy'])->name('admin.days.destroy');

        // روت‌های مدیریت بازه‌های زمانی
        Route::get('time_slots/index', [TimeSlotController::class, 'index'])->name('admin.time_slots.index')->middleware('permission:manage time slots list');
        Route::get('time_slots/create', [TimeSlotController::class, 'create'])->name('admin.time_slots.create')->middleware('permission:manage time slots add');
        Route::post('time_slots', [TimeSlotController::class, 'store'])->name('admin.time_slots.store')->middleware('permission:manage time slots');
        Route::get('time_slots/{time_slot}', [TimeSlotController::class, 'show'])->name('admin.time_slots.show')->middleware('permission:manage time slots');
        Route::get('time_slots/{time_slot}/edit', [TimeSlotController::class, 'edit'])->name('admin.time_slots.edit')->middleware('permission:manage time slots adit');
        Route::patch('time_slots/{time_slot}', [TimeSlotController::class, 'update'])->name('admin.time_slots.update')->middleware('permission:manage time slots');
        Route::delete('time_slots/{time_slot}', [TimeSlotController::class, 'destroy'])->name('admin.time_slots.destroy')->middleware('permission:manage time slots delete');
    });

    Route::prefix('admin')->group(function () {
        // روت‌های مدیریت مشاوره‌ها
        Route::get('consultations/index', [ConsultationController::class, 'index'])->name('admin.consultations.index')->middleware('permission:manage consultations');
        Route::get('consultations/create', [ConsultationController::class, 'create'])->name('admin.consultations.create')->middleware('permission:manage consultations add');
        Route::post('consultations/store', [ConsultationController::class, 'store'])->name('admin.consultations.store')->middleware('permission:manage consultations');
        Route::get('consultations/{consultation}', [ConsultationController::class, 'show'])->name('consultations.show')->middleware('permission:manage consultations');
        Route::get('consultations/{consultation}/edit', [ConsultationController::class, 'edit'])->name('admin.consultations.edit')->middleware('permission:manage consultations aedit');
        Route::patch('consultations/{consultation}', [ConsultationController::class, 'update'])->name('admin.consultations.update')->middleware('permission:manage consultations');
        Route::delete('consultations/{consultation}', [ConsultationController::class, 'destroy'])->name('admin.consultations.destroy')->middleware('permission:manage consultations delete');

        Route::post('reservations/{id}/update-session-link', [AdminReservationController::class, 'updateSessionLink'])->name('admin.reservations.updateSessionLink')->middleware('permission:manage reservations');
        Route::get('reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index')->middleware('permission:manage reservations list');
        Route::delete('reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy')->middleware('permission:manage reservations delete');
    });






    Route::prefix('admin')->group(function () {
        Route::get('articles/index', [ArticleController::class, 'index'])->name('articles.index')->middleware('permission:manage articles');
        Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('permission:manage articles add');
        Route::post('articles', [ArticleController::class, 'store'])->name('articles.store')->middleware('permission:manage articles');
        Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('permission:manage articles edit');
        Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('permission:manage articles');
        Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('permission:manage articles delete');
    });


    Route::prefix('')->group(function () {
        // Routes for PageController
        Route::get('admin/pages', [PageController::class, 'index'])->name('pages.index')->middleware('permission:manage pages list');
        Route::get('admin/pages/create', [PageController::class, 'create'])->name('pages.create')->middleware('permission:manage pages add');
        Route::post('admin/pages', [PageController::class, 'store'])->name('pages.store')->middleware('permission:manage pages');
        Route::get('admin/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit')->middleware('permission:manage pages edit');
        Route::put('admin/pages/{page}', [PageController::class, 'update'])->name('pages.update')->middleware('permission:manage pages');
        Route::delete('admin/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy')->middleware('permission:manage pages delete');
    });

    Route::prefix('admin')->group(function () {
        Route::get('who-we-are/edit', [WhoWeAreController::class, 'edit'])->name('who-we-are.edit')->middleware('permission:manage who-we-are edit');
        Route::post('who-we-are/update', [WhoWeAreController::class, 'update'])->name('who-we-are.update')->middleware('permission:manage who-we-are');
    });


    // routes/web.php
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('client-section', [ClientSectionController::class, 'edit'])->name('client-section.edit')->middleware('permission:manage client section');
        Route::patch('client-section', [ClientSectionController::class, 'update'])->name('client-section.update')->middleware('permission:manage client section');
    });


    Route::prefix('admin')->group(function () {
        Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index')->middleware('permission:manage testimonials list');
        Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create')->middleware('permission:manage testimonials add');
        Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store')->middleware('permission:manage testimonials');
        Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit')->middleware('permission:manage testimonials edit');
        Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update')->middleware('permission:manage testimonials');
        Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy')->middleware('permission:manage testimonials delete');
    });
});
