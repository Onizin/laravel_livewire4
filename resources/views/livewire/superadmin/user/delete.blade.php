<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                Name
            </div>
            <div class="col-8">
                : {{ $name }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Email
            </div>
            <div class="col-8">
                : {{ $email }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Role
            </div>
            <div class="col-8">
            :
                @if($role == 'Super Admin')
                    <td>
                        <span class="badge badge-info"> {{ $role}}</span>
                    </td>
                @else
                    <td>
                        <span class="badge badge-primary"> {{ $role}}</span>
                    </td>
                @endif
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Close</button>
        <button type="button" class="btn btn-danger" wire:click="destroy({{$user_id}})"><i class="fas fa-trash mr-1"></i>Delete</button>
      </div>
    </div>
  </div>
</div>