<div wire:ignore.self class="modal fade" id="createModalBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mt-2">
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
        <div class="row mt-2"
            <label class="form-label">Kategori <span class="text-danger">*</span></label>
            <select wire:model="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
              <option value="">-- Pilih Kategori --</option> {{-- hapus 'disabled selected' --}}
              @foreach($kategori as $kategoris)
                  <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
              @endforeach
          </select>
            @error('kategori_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
        <div class="row mt-2">
            <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
            <input wire:model="kode" type="text" 
                   class="form-control @error('kode') is-invalid @enderror" 
                   placeholder="Contoh: BRG-0001">
            @error('kode')
              <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="row mt-2">
          <div class="col-6">
            <label class="form-label">Stok <span class="text-danger">*</span></label>
            <input wire:model="stok" type="number" min="0"
                   class="form-control @error('stok') is-invalid @enderror" 
                   placeholder="0">
            @error('stok')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-6">
            <label class="form-label">Satuan <span class="text-danger">*</span></label>
            <select wire:model="satuan" class="form-control @error('satuan') is-invalid @enderror">
              <option value="">-- Pilih --</option>
              <option value="pcs">Pcs</option>
              <option value="kg">Kg</option>
              <option value="liter">Liter</option>
              <option value="box">Box</option>
              <option value="lusin">Lusin</option>
            </select>
            @error('satuan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-12">
            <label class="form-label">Harga <span class="text-danger">*</span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input wire:model="harga" type="number" min="0"
                     class="form-control @error('harga') is-invalid @enderror" 
                     placeholder="0">
            </div>
            @error('harga')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Close</button>
        <button type="button" class="btn btn-primary" wire:click="store"><i class="fas fa-save mr-1"></i>Save</button>
      </div>
    </div>
  </div>
</div>
