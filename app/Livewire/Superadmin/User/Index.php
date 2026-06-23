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
    public $search = '';
    public $name, $email, $password,$password_confirmation, $role, $user_id;

    public function render()
    {
        $data = array(
            'title'=>'Data User',
            'user'=>User::where('name','like','%'.$this->search.'%')
                    ->orwhere('email','like','%'.$this->search.'%')
                    ->orwhere('role','like','%'.$this->search.'%')
                    ->orderBy('role','asc')->paginate($this->paginate),
        );
        return view('livewire.superadmin.user.index',$data);
    }

    public function store(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'role'=>'required',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password',
        ],
        [
            'name.required'=>'Nama user wajib diisi',
            'email.required'=>'Email user wajib diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email sudah digunakan',
            'password.required'=>'Password user wajib diisi',
            'password.min'=>'Password minimal 6 karakter',
            'password_confirmation.required'=>'Password konfirmasi wajib diisi',
            'password_confirmation.same'=>'Password konfirmasi tidak sama',
            'role.required'=>'Role user wajib diisi',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->role = $this->role;
        $user->save();
        $this->dispatch('closeCreateModal');
    }

    public function create(){
        $this->resetValidation();
        $this->reset(['name','email','password','password_confirmation','role']);
    }

    public function edit($id){
        $this->resetValidation();
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email= $user->email;
        $this->role = $user->role;
        $this->user_id = $user->id;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function update($id){
        $user = User::findOrFail($id);
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'role'=>'required',
            'password'=>'nullable|confirmed|min:6',
        ],
        [
            'name.required'=>'Nama user wajib diisi',
            'email.required'=>'Email user wajib diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email sudah digunakan',
            'role.required'=>'Role user wajib diisi',
            'password.min'=>'Password minimal 6 karakter',
            'password.confirmed'=>'Password konfirmasi tidak sama',
        ]);

        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if($this->password){
            $user->password = bcrypt($this->password);
        }
        $user->save();
        $this->dispatch('closeEditModal');
    }

    public function confirm($id){
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->user_id = $user->id;
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('closeDeleteModal');
    }
}
