<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;



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




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/teams', [HomeController::class, 'teams'])->name('teams');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/blog', [HomeController::class, 'frontBlog'])->name('blog-front');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');





Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authLogin'])->name('login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');

Route::get('/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verify');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendForgotPassword'])->name('forgot-password');

Route::get('/reset/{token}', [AuthController::class, 'resetPassword'])->name('reset');
Route::post('/reset/{token}', [AuthController::class, 'postResetPassword'])->name('reset');

// Admin Dashboard
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware'=>'admin'], function(){
    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // User CRUD
    Route::get('/panel/user/list', [UserController::class, 'userTable'])->name('user');
    Route::get('/panel/user/add', [UserController::class, 'addUser'])->name('add-user');
    Route::post('/panel/user/add', [UserController::class, 'insertUser'])->name('insert-user');

    Route::get('/panel/user/edit/{id}', [UserController::class, 'editUser'])->name('edit-user');
    Route::post('/panel/user/edit/{id}', [UserController::class, 'updateUser'])->name('update-user');

    Route::get('/panel/user/delete/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
    // User CRUD End

    // Category CRUD
    Route::get('/panel/category/list', [CategoryController::class, 'categoryTable'])->name('category');
    Route::get('/panel/category/add', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/panel/category/add', [CategoryController::class, 'insertCategory'])->name('insert-category');

    Route::get('/panel/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/panel/category/edit/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');

    Route::get('/panel/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

    // Category CRUD End

    // Page
    Route::get('/panel/page/list', [PageController::class, 'pageTable'])->name('page');
    Route::get('/panel/page/add', [PageController::class, 'addPage'])->name('add-page');
    Route::post('/panel/page/add', [PageController::class, 'insertPage'])->name('insert-page');

    Route::get('/panel/page/edit/{id}', [PageController::class, 'editPage'])->name('edit-page');
    Route::post('/panel/page/edit/{id}', [PageController::class, 'updatePage'])->name('update-page');

    // Page
    Route::get('/panel/blog/delete/{id}', [HomeController::class, 'commentBlog'])->name('home-comment-section');
    Route::post('home-comment-reply-section', [HomeController::class, 'replyBlog'])->name('home-comment-reply-section');

    // Gallery CRUD
    Route::get('/panel/gallery/list', [GalleryController::class, 'galleryTable'])->name('gallery_back');
    Route::get('/panel/gallery/add', [GalleryController::class, 'addGallery'])->name('add-gallery');
    Route::post('/panel/gallery/add', [GalleryController::class, 'insertGallery'])->name('insert-gallery');

    Route::get('/panel/gallery/edit/{id}', [GalleryController::class, 'editGallery'])->name('edit-gallery');
    Route::post('/panel/gallery/edit/{id}', [GalleryController::class, 'updateGallery'])->name('update-gallery');

    Route::get('/panel/gallery/delete/{id}', [GalleryController::class, 'deleteGallery'])->name('delete-gallery');
    // Gallery CRUD End

    // Team CRUD
    Route::get('/panel/team/list', [TeamController::class, 'teamTable'])->name('team_back');
    Route::get('/panel/team/add', [TeamController::class, 'addTeam'])->name('add-team');
    Route::post('/panel/team/add', [TeamController::class, 'insertTeam'])->name('insert-team');

    Route::get('/panel/team/edit/{id}', [TeamController::class, 'editTeam'])->name('edit-team');
    Route::post('/panel/team/edit/{id}', [TeamController::class, 'updateTeam'])->name('update-team');

    Route::get('/panel/team/delete/{id}', [TeamController::class, 'deleteTeam'])->name('delete-team');
    // Team CRUD End

    // Testimonial CRUD
    Route::get('/panel/testimonial/list', [TestimonialController::class, 'testimonialTable'])->name('testimonial');
    Route::get('/panel/testimonial/add', [TestimonialController::class, 'addTestimonial'])->name('add-testimonial');
    Route::post('/panel/testimonial/add', [TestimonialController::class, 'insertTestimonial'])->name('insert-testimonial');

    Route::get('/panel/testimonial/edit/{id}', [TestimonialController::class, 'editTestimonial'])->name('edit-testimonial');
    Route::post('/panel/testimonial/edit/{id}', [TestimonialController::class, 'updateTestimonial'])->name('update-testimonial');

    Route::get('/panel/testimonial/delete/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('delete-testimonial');
    // Testimonial CRUD End

    Route::get('/panel/bookings/list', [BookingController::class, 'showForm'])->name('bookings-form');
    
});

Route::group(['middleware'=>'adminuser'], function(){
    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    // Category CRUD
    Route::get('/panel/category/list', [CategoryController::class, 'categoryTable'])->name('category');
    Route::get('/panel/category/add', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/panel/category/add', [CategoryController::class, 'insertCategory'])->name('insert-category');

    Route::get('/panel/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/panel/category/edit/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');

    Route::get('/panel/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

    // Category CRUD End
    

    // Blog CRUD
    Route::get('/panel/blog/list', [BlogController::class, 'blogTable'])->name('blog');
    Route::get('/panel/blog/add', [BlogController::class, 'addBlog'])->name('add-blog');
    Route::post('/panel/blog/add', [BlogController::class, 'insertBlog'])->name('insert-blog');

    Route::get('/panel/blog/edit/{id}', [BlogController::class, 'editBlog'])->name('edit-blog');
    Route::post('/panel/blog/edit/{id}', [BlogController::class, 'updateBlog'])->name('update-blog');

    Route::get('/panel/blog/delete/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');

    // Blog CRUD End
    Route::post('home-comment-section', [HomeController::class, 'commentBlog'])->name('home-comment-section');
    Route::post('home-comment-reply-section', [HomeController::class, 'replyBlog'])->name('home-comment-reply-section');

    
});

Route::post('bookings-form-store', [BookingController::class, 'storeBooking'])->name('bookings-form-store');

Route::get('{slug}', [HomeController::class, 'singleBlog']);
Route::get('/category/{slug}', [HomeController::class, 'category']);