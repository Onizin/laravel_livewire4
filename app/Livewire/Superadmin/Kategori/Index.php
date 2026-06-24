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
        $data = array(
            'title'=>'Data Kategori',
        );
        return view('livewire.superadmin.kategori.index',$data);
    }
}
