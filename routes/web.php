<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');

// jika ada GET ke /proses-login, arahkan kembali ke formulir login
Route::get('/proses-login', function () {
    return redirect()->route('login');
});

// proses login route; beri nama unik agar form bisa mengarah ke sini
Route::post('/proses-login', [AuthController::class, 'login'])->name('login.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Routes middleware admin 
Route::middleware('admin')->group(function () {

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/kategori', function () {
    return view('admin.formkategori');
})->name('kategori');

Route::post('/proses-data-kategori', [App\Http\Controllers\Kategori::class, 'proses_data_kategori'])->name('proses.data.kategori');

Route::get('/datakategori', [App\Http\Controllers\Kategori::class, 'read_data_kategori'])->name('data.kategori');

Route::get('/editkategori/{id}', [App\Http\Controllers\Kategori::class, 'edit_data_kategori'])->name('admin.kategori.edit');

Route::post('/updatekategori/{id}', [App\Http\Controllers\Kategori::class, 'update_data_kategori'])->name('admin.kategori.update');

Route::delete('/deletekategori/{id}', [App\Http\Controllers\Kategori::class, 'delete_data_kategori'])->name('admin.kategori.delete');
});

// Routes middleware user
Route::middleware('user')->group(function () {

Route::get('/user/dashboard', function () { 
return view('user.dashboard');
})->name('user.dashboard');
});

