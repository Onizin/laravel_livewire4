<div>
        <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-warehouse mr-2"></i>
                            {{$title}}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home mr-1"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalBarang">
                                    <i class="fas fa-plus mr-1"></i>Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="col-2">
                            <select wire:model.change="paginate" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input wire:model.live="search" class="form-control" placeholder="Cari barang...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $item->kode}}</td>
                                            <td>{{ $item->nama}}</td>
                                            <td>{{ $item->kategori->nama}}</td>
                                            <td width="300">{{ $item->deskripsi}}</td>
                                            <td>{{ $item->stok}}</td>
                                            <td>{{ $item->harga}}</td>
                                            <td>{{ $item->satuan}}</td>
                                            <td>
                                                <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalBarang">
                                                    <i class="fas fa-edit mr-1"></i>
                                                </button>
                                                <button wire:click="deleteConfirm({{$item->id}})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBarang">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        {{ $barang->links() }}
                    </div>

                </div>

            </div>
        </section>
        @include('livewire.superadmin.barang.create')
        @include('livewire.superadmin.barang.edit')
        @include('livewire.superadmin.barang.delete')
        @script
            <script>
                $wire.on('closeCreateModalBarang',()=>{
                    $('#createModalBarang').modal('hide');
                    Swal.fire({
                        title:"Berhasil",
                        text:"Data Berhasil Disimpan",
                        icon:"success",
                    });
                });
 
                $wire.on('closeEditModalBarang',()=>{
                    $('#editModalBarang').modal('hide');
                    Swal.fire({
                        title:"Berhasil",
                        text:"Data Berhasil Diupdate",
                        icon:"success",
                    });
                });

                $wire.on('closeDeleteModalBarang',()=>{
                    $('#deleteModalBarang').modal('hide');
                    Swal.fire({
                        title:"Berhasil",
                        text:"Data Berhasil Dihapus",
                        icon:"success",
                    });
                });
            </script>
        @endscript
    </div>
</div>
