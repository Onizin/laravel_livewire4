<?php

namespace App\Livewire\Superadmin\User;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public int $paginate = 10;

    public function render()
    {
        $data = array(
            'user'=>User::orderBy('role','asc')->paginate($this->paginate),
        );
        return view('livewire.superadmin.user.index',$data);
    }
}
