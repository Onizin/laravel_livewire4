<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\UserExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('superadmin/user','superadmin.user.index')->name('superadmin.user.index');
Route::view('superadmin/kategori','superadmin.kategori.index')->name('superadmin.kategori.index');
Route::view('superadmin/barang','superadmin.barang.index')->name('superadmin.barang.index');

Route::get('superadmin/user/export/excel', [UserExportController::class, 'excel'])->name('superadmin.user.export.excel');
Route::get('superadmin/user/export/pdf',   [UserExportController::class, 'pdf'])->name('superadmin.user.export.pdf');

Route::get('superadmin/kategori/export/excel', [UserExportController::class, 'excelKategori'])->name('superadmin.kategori.export.excel');
Route::get('superadmin/kategori/export/pdf',   [UserExportController::class, 'pdfKategori'])->name('superadmin.kategori.export.pdf');