<div wire:ignore.self class="modal fade" id="editModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <label for="nama" class="form-label">Nama</label>
            <span class="text-danger">*</span>
            <input wire:model="nama" type="text" class="form-control" placeholder="Nama Kategori">
            @error('nama')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <span class="text-danger">*</span>
            <input wire:model="deskripsi" type="text" class="form-control" placeholder="Deskripsi Kategori">

            @error('deskripsi')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Close</button>
        <button type="button" class="btn btn-warning" wire:click="update({{$kategori_id}})"><i class="fas fa-save mr-1"></i>Update</button>
      </div>
    </div>
  </div>
</div>
