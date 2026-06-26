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

    public function store(){
        $this->validate([
            'nama'=>'required|unique:kategoris,nama',
            'deskripsi'=>'required',
        ],
        [
            'nama.required'=>'Nama kategori wajib diisi',
            'nama.unique'=>'Nama kategori sudah digunakan',
            'deskripsi.required'=>'Deskripsi kategori wajib diisi',
        ]);
        $kategori = new Kategori();
        $kategori->nama= $this->nama;
        $kategori->deskripsi = $this->deskripsi;
        $kategori->slug = \Str::slug($this->nama);
        $kategori->save();
        $this->dispatch('closeCreateModalKategori');
    }

    public function create(){
        $this->resetValidation();
        $this->reset(['nama','deskripsi']);
    }

    public function edit($ids){
        $this->resetValidation();
        $kategori = Kategori::findOrFail($ids);
        $this->nama = $kategori->nama;
        $this->deskripsi = $kategori->deskripsi;
        $this->kategori_id = $kategori->id;
    }

    public function update($ids){
        $kategori = Kategori::findOrFail($ids);
        $this->validate([
            'nama'=>'required|unique:kategoris,nama',
            'deskripsi'=>'required',
        ],
        [
            'nama.required'=>'Nama kategori wajib diisi',
            'nama.unique'=>'Nama kategori sudah digunakan',
            'deskripsi.required'=>'Deskripsi kategori wajib diisi',
        ]);
        $kategori->nama = $this->nama;
        $kategori->deskripsi = $this->deskripsi;
        $kategori->slug = \Str::slug($this->nama);
        $kategori->save();
        $this->dispatch('closeEditModalKategori');
    }

    public function deleteConfirm($id){
        $kategori = Kategori::findOrFail($id);
        $this->nama = $kategori->nama;
        $this->deskripsi = $kategori->deskripsi;
    }

    public function delete($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        $this->dispatch('closeDeleteModalKategori');
    }
}
