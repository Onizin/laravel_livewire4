<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <label for="name" class="form-label">Name</label>
            <span class="text-danger">*</span>
            <input wire:model="name" type="text" class="form-control" placeholder="Nama user">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="email" class="form-label">Email</label>
            <span class="text-danger">*</span>
            <input wire:model="email" type="email" class="form-control" placeholder="Email user">

            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="role" class="form-label">Role</label>
            <span class="text-danger">*</span>
            <select wire:model="role" id="role" class="form-control @error('role') is-invalid @enderror">
                <option value="" selected disabled>--Pilih Role--</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin">Admin</option>
            </select>
            @error('role')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="password" class="form-label">Password</label>
            <span class="text-danger">*</span>
            <input wire:model="password" type="password" class="form-control" placeholder="Password user">
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="password_confirmation" class="form-label">Password Komfirmasi</label>
            <span class="text-danger">*</span>
            <input wire:model="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation">
            @error('password_confirmation')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Close</button>
        <button type="button" class="btn btn-primary" wire:click="store"><i class="fas fa-save mr-1"></i>Save</button>
      </div>
    </div>
  </div>
</div>