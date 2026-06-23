<div>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><i class="fas fa-user mr-2"></i>
                {{ $title}}
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i>Dashboard</a>
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
              <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">
                  <i class="fas fa-plus mr-1"></i>Tambah Data
              </button>
            </div>
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-sn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-print mr-1"></i>
                Cetak
              </button>
            <div class="dropdown-menu">
              <a class="dropdown-item text-success" href="{{ route('superadmin.user.export.excel') }}"><i class="fas fa-file-excel mr-1"></i>Excel</a>
              <a class="dropdown-item text-danger" href="{{ route('superadmin.user.export.pdf') }}"><i class="fas fa-file-pdf mr-1"></i>PDF</a>
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
              <input wire:model.live="search" class="form-control" placeholder="Cari user...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $item)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $item->name}}</td>
                      <td>{{ $item->email}}</td>
                      @if($item->role == 'Super Admin')
                      <td>
                        <span class="badge badge-info">{{ $item->role}}</span>
                      </td>
                      @else
                      <td>
                        <span class="badge badge-primary">{{ $item->role}}</span>
                      </td>
                      @endif
                      <td>
                        <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                          <i class="fas fa-edit mr-1"></i>
                        </button>
                        <button wire:click="confirm({{$item->id}})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
          </div>
        </div>

      </div>
    </section>

    @include('livewire.superadmin.user.create')

    @include('livewire.superadmin.user.edit')

    @include('livewire.superadmin.user.delete')
    
    @script 
      <script>
        $wire.on('closeCreateModal',()=>{
          $('#createModal').modal('hide');
          Swal.fire({
            title:"Berhasil",
            text:"Data Berhasil Disimpan",
            icon:"success",
          });
        });
 
        $wire.on('closeEditModal',()=>{
          $('#editModal').modal('hide');
          Swal.fire({
            title:"Berhasil",
            text:"Data Berhasil Diupdate",
            icon:"success",
          });
        });

        $wire.on('closeDeleteModal',()=>{
          $('#deleteModal').modal('hide');
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
