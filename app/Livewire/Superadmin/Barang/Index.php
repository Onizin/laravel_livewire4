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
    public $nama,$kode,$deskripsi,$stok,$harga,$satuan,$kategori_id,$barang_id,$kategori_nama;

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

    public function store(){
        $this->validate([
            'kode'=>'required|unique:barangs,kode',
            'nama'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required|numeric',
            'harga'=>'required|numeric',
            'satuan'=>'required',
            'kategori_id'=>'required',
        ],
        [
            'kode.required'=>'Kode barang wajib diisi',
            'kode.unique'=>'Kode barang sudah digunakan',
            'nama.required'=>'Nama barang wajib diisi',
            'deskripsi.required'=>'Deskripsi barang wajib diisi',
            'stok.required'=>'Stok barang wajib diisi',
            'stok.numeric'=>'Stok barang harus berupa angka',
            'harga.required'=>'Harga barang wajib diisi',
            'harga.numeric'=>'Harga barang harus berupa angka',
            'satuan.required'=>'Satuan barang wajib diisi',
            'kategori_id.required'=>'Kategori barang wajib diisi',
        ]);
        $barang = new Barang();
        $barang->kode= $this->kode;
        $barang->nama= $this->nama;
        $barang->deskripsi = $this->deskripsi;
        $barang->stok = $this->stok;
        $barang->harga = $this->harga;
        $barang->satuan = $this->satuan;
        $barang->kategori_id = $this->kategori_id;
        $barang->save();
        $this->dispatch('closeCreateModalBarang');
    }

    public function create(){
        $this->resetValidation();
        $this->reset(['nama','kode','deskripsi','stok','harga','satuan','kategori_id']);
    }
    
    public function edit($id){
        $this->resetValidation();
        $barang = Barang::findorFail($id);
        $this->nama = $barang->nama;
        $this->kode = $barang->kode;
        $this->deskripsi = $barang->deskripsi;
        $this->stok = $barang->stok;
        $this->harga = $barang->harga;
        $this->satuan = $barang->satuan;
        $this->kategori_id = $barang->kategori_id;
        $this->barang_id = $barang->id;
    }

    public function update($id){
        $barang = Barang::findorFail($id);
        $this->validate([
            'kode'=>'required|unique:barangs,kode,'.$barang->id,
            'nama'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required|numeric',
            'harga'=>'required|numeric',
            'satuan'=>'required',
            'kategori_id'=>'required',
        ],
        [
            'kode.required'=>'Kode barang wajib diisi',
            'kode.unique'=>'Kode barang sudah digunakan',
            'nama.required'=>'Nama barang wajib diisi',
            'deskripsi.required'=>'Deskripsi barang wajib diisi',
            'stok.required'=>'Stok barang wajib diisi',
            'stok.numeric'=>'Stok barang harus berupa angka',
            'harga.required'=>'Harga barang wajib diisi',
            'harga.numeric'=>'Harga barang harus berupa angka',
            'satuan.required'=>'Satuan barang wajib diisi',
            'kategori_id.required'=>'Kategori barang wajib diisi',
        ]);
        $barang->kode= $this->kode;
        $barang->nama= $this->nama;
        $barang->deskripsi = $this->deskripsi;
        $barang->stok = $this->stok;
        $barang->harga = $this->harga;
        $barang->satuan = $this->satuan;
        $barang->kategori_id = $this->kategori_id;
        $barang->save();
        $this->dispatch('closeEditModalBarang');
    }

    public function deleteConfirm($id){
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::findOrFail($barang->kategori_id);
        $this->nama = $barang->nama;
        $this->kode = $barang->kode;
        $this->deskripsi = $barang->deskripsi;
        $this->stok = $barang->stok;
        $this->harga = $barang->harga;
        $this->satuan = $barang->satuan;
        $this->kategori_nama = $kategori->nama;
        $this->barang_id = $barang->id;
    }
    
    public function delete($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        $this->dispatch('closeDeleteModalBarang');
    }
}

