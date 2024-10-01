<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;

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

Route::redirect('/', '/books', 301);
Route::get('/books', [HomePageController::class, 'index'])->name("home");
Route::put('/books/rent/{id}', [HomePageController::class, 'rent'])->name("rent");

Route::get('/Ad_login', [AuthController::class, 'admin_login_page'])->name('admin_login');
Route::post('/Ad_login', [AuthController::class, 'Ad_login']);

Route::view('/Ad_signup', 'Auth.Ad_signup')->name('admin_signup');
Route::post('/Ad_signup', [AuthController::class, 'Ad_signup']);

Route::view('/Ow_signup', 'Auth.Ow_signup')->name('owner_signup');
Route::post('/Ow_signup', [AuthController::class, 'Ow_signup']);


Route::get('/Ow_login', [AuthController::class, 'owner_login_page'])->name('owner_login');
Route::post('/Ow_login', [AuthController::class, 'Ow_login']);


//Only accessed by authorized users
Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //Book Owners Route
    Route::get('/owner-dashboard', [DashboardController::class, 'listOfBooks'])->name('owner-dashboard');
    Route::get('/book_list', [BooksController::class, 'index'])->name('book-list');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books-create');
    Route::post('/books/create', [BooksController::class, 'store'])->name('books-store');
    Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])->name('book_delete');
    Route::get('/books/edit/{id}', [BooksController::class, 'edit'])->name('edit_book');
    Route::put('/books/edit/{id}', [BooksController::class, 'update'])->name('book_update');

    //admin routes
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::delete('admin/user/delete/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');

    Route::get('admin/users', [DashboardController::class, 'listAllUsers'])->name("all-users");
    Route::get('admin/user/approveUser/{id}', [DashboardController::class, 'userApproval'])->name("user-approval");
    Route::get('admin/user/denyUser/{id}', [DashboardController::class, 'userDeny'])->name("user-deny");

    Route::get('admin/books', [DashboardController::class, 'listAllBooks'])->name("all-books");
    Route::get('admin/books/approveBook/{id}', [DashboardController::class, 'bookApproval'])->name("book-approval");
    Route::get('admin/books/denyBook/{id}', [DashboardController::class, 'bookDeny'])->name("book-deny");
    Route::delete('admin/books/delete/{id}', [DashboardController::class, 'deleteBook'])->name('deleteBook');

});









