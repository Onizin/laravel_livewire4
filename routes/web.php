<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\UserExportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');
})->name('home');

Route::view('/login', 'auth.login')->middleware('guest')->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->middleware('auth')->name('logout');

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::view('admin/barang', 'admin.barang.index')
    ->middleware(['auth', 'role:Admin,Super Admin'])
    ->name('admin.barang.index');

Route::view('superadmin/user', 'superadmin.user.index')
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.user.index');

Route::view('superadmin/kategori', 'superadmin.kategori.index')
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.kategori.index');

Route::view('superadmin/barang', 'superadmin.barang.index')
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.barang.index');

Route::get('superadmin/user/export/excel', [UserExportController::class, 'excel'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.user.export.excel');

Route::get('superadmin/user/export/pdf', [UserExportController::class, 'pdf'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.user.export.pdf');

Route::get('superadmin/kategori/export/excel', [UserExportController::class, 'excelKategori'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.kategori.export.excel');

Route::get('superadmin/kategori/export/pdf', [UserExportController::class, 'pdfKategori'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.kategori.export.pdf');

Route::get('superadmin/barang/export/excel', [UserExportController::class, 'excelbarang'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.barang.export.excel');

Route::get('superadmin/barang/export/pdf', [UserExportController::class, 'pdfbarang'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('superadmin.barang.export.pdf');