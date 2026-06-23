<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $search;
    
    public function __contruct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        return User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->orderBy('role', 'asc')
            ->get();
    }

    public function headings(): array{
        return ['No', 'Nama', 'Email', 'Role'];
    }

    public function map($user): array{
        static $no =0;
        $no++;
        return [$no, $user->name, $user->email, $user->role];
    }

     public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
