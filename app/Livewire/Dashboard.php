<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        $data = [
            'user' => $user,
            'isSuperAdmin' => $user?->isSuperAdmin() ?? false,
            'isAdmin' => $user?->isAdmin() ?? false,
            'totalBarang' => Barang::count(),
            'totalKategori' => Kategori::count(),
        ];

        if ($user?->isSuperAdmin()) {
            $data['totalUser'] = User::count();
        }

        return view('livewire.dashboard', $data);
    }
}
