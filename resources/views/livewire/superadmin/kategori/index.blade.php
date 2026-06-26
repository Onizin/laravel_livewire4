<div>
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-list mr-2"></i>
              {{ $title}}
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-list mr-1"></i>Dashboard</a>
              </li>
              <li class="breadcrumb-item active">{{ $title}}</li>
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
              <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalKategori">
                  <i class="fas fa-plus mr-1"></i>Tambah Data
              </button>
            </div>
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-sn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-print mr-1"></i>
                Cetak
              </button>
            <div class="dropdown-menu">
              <a class="dropdown-item text-success" href="{{ route('superadmin.kategori.export.excel') }}"><i class="fas fa-file-excel mr-1"></i>Excel</a>
              <a class="dropdown-item text-danger" href="{{ route('superadmin.kategori.export.pdf') }}"><i class="fas fa-file-pdf mr-1"></i>PDF</a>
            </div>
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
              <input wire:model.live="search" class="form-control" placeholder="Cari kategori...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($kategori as $item)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $item->nama}}</td>
                      <td>{{ $item->deskripsi}}</td>
                      <td>
                        <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalKategori">
                          <i class="fas fa-edit mr-1"></i>
                        </button>
                        <button wire:click="deleteConfirm({{$item->id}})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalKategori">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $kategori->links() }}
          </div>

        </div>

      </div>
    </section>
    @include('livewire.superadmin.kategori.create')
    @include('livewire.superadmin.kategori.edit')
    @include('livewire.superadmin.kategori.delete')
    @script
      <script>
        $wire.on('closeCreateModalKategori',()=>{
          $('#createModalKategori').modal('hide');
          Swal.fire({
            title:"Berhasil",
            text:"Data Berhasil Disimpan",
            icon:"success",
          });
        });
 
        $wire.on('closeEditModalKategori',()=>{
          $('#editModalKategori').modal('hide');
          Swal.fire({
            title:"Berhasil",
            text:"Data Berhasil Diupdate",
            icon:"success",
          });
        });

        $wire.on('closeDeleteModalKategori',()=>{
          $('#deleteModalKategori').modal('hide');
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
