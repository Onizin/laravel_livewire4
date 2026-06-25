<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    public function excel()
    {
        return Excel::download(new UserExport(), 'data-user-' . now()->format('d-m-Y') . '.xlsx');
    }

    public function pdf()
    {
        $users = User::orderBy('role', 'asc')->get();
        $pdf = Pdf::loadView('exports.user-pdf', [
            'users' => $users,
            'title' => 'Data User',
            'date'  => now()->format('d M Y'),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('data-user-' . now()->format('d-m-Y') . '.pdf');
    }

    public function excelKategori(){
        
    }
    
    public function pdfKategori(){

    }
}
