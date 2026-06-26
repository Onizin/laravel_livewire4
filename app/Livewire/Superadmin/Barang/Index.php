<?php

namespace App\Livewire\Superadmin\Barang;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\Kategori;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public int $paginate = 10;
    public $search = '';
    public $nama,$kode,$deskripsi,$stok,$harga,$satuan,$kategori_id;

    public function render()
    {
        $data = array(
            'title'=>'Data Barang',
            'barang'=>Barang::where('nama','like','%'.$this->search.'%')
                    ->orwhere('kode','like','%'.$this->search.'%')
                    ->orwhere('deskripsi','like','%'.$this->search.'%')
                    ->orwhere('stok','like','%'.$this->search.'%')
                    ->orwhere('harga','like','%'.$this->search.'%')
                    ->orwhere('satuan','like','%'.$this->search.'%')
                    ->orwhere('kode','like','%'.$this->search.'%')
                    ->paginate($this->paginate),
            'kategori'=>Kategori::all(),
        );
        return view('livewire.superadmin.barang.index',$data);
    }
    
}
