<?php

namespace App\Livewire\Superadmin\Kategori;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public int $paginate = 10;
    public $search = '';
    public $nama,$deskripsi,$kategori_id;


    public function render()
    {
        $data = array(
            'title'=>'Data Kategori',
            'kategori'=>Kategori::where('nama','like','%'.$this->search.'%')
                    ->orwhere('deskripsi','like','%'.$this->search.'%')
                    ->orderBy('nama','asc')->paginate($this->paginate),
        );
        return view('livewire.superadmin.kategori.index',$data);
    }
}
