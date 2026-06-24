<?php

namespace App\Livewire\Superadmin\Kategori;


use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        
        return view('livewire.superadmin.kategori.index');
    }
}
