<div wire:ignore.self class="modal fade" id="deleteModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                Nama
            </div>
            <div class="col-8">
                : {{ $nama }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Deskripsi
            </div>
            <div class="col-8">
                : {{ $deskripsi }}
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Close</button>
        <button type="button" class="btn btn-danger" wire:click="delete({{$kategori_id}})"><i class="fas fa-trash mr-1"></i>Delete</button>
      </div>
    </div>
  </div>
</div>