<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/admin/books', [AdminController::class,'allBooks'])->name('admin.books');
        Route::get('/admin/borrowed', [AdminController::class,'borrowedBooks'])->name('admin.borrowed');
        Route::get('/admin/users', [AdminController::class,'allUsers'])->name('admin.users');

        Route::get('/admin/student/search', [AdminController::class,'searchStudent'])->name('admin.student_details');
        Route::get('/admin/student/{id}', [AdminController::class,'viewStudent'])->name('admin.student.view');
        Route::get('/admin/profile/edit', [AdminController::class,'editProfile'])->name('admin.profile.edit');

        Route::post('/admin/profile/update', [AdminController::class,'updateProfile'])->name('admin.profile.update');


        Route::get('/admin/book/create', [AdminController::class,'createBookForm'])->name('admin.createBook');
        Route::post('/admin/book/create', [AdminController::class,'createBook'])->name('admin.storeBook');
        Route::get('/admin/book/{book}/edit', [AdminController::class,'editBook'])->name('admin.editBook');

        Route::put('/admin/book/{book}', [AdminController::class,'updateBook'])->name('admin.updateBook');
        Route::delete('/admin/book/{book}', [AdminController::class,'deleteBook'])->name('admin.deleteBook');
    });

    Route::get('/student/dashboard', [StudentController::class,'dashboard'])->name('student.dashboard');
    Route::get('/student/books', [StudentController::class,'allBooks'])->name('student.books');
    Route::post('/student/borrow/{book}', [StudentController::class,'borrowBook'])->name('student.borrow');
    Route::post('/student/return/{borrow}', [StudentController::class,'returnBook'])->name('student.return');
    Route::get('/student/profile/edit', [StudentController::class,'editProfile'])->name('student.profile.edit');
    Route::post('/student/profile/update', [StudentController::class,'updateProfile'])->name('student.profile.update');
    Route::get('/student/borrowed', [StudentController::class,'myBorrowedBooks'])->name('student.my_borrows');

});

require __DIR__.'/auth.php';
