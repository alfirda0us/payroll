<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser; 
use Livewire\Component;

class User extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;
    public $editCheck = false;
    public $idEdit;
    public $keyword;

    public function render()
    {
        $users = ModelsUser::where('name','like','%'. $this->keyword.'%')->orWhere('email','like','%'. $this->keyword.'%')->get();
        return view('livewire.admin.user', compact('users'));
        
    }

    public function store(){
        $validate = $this->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password' => 'required',
            'role'=>'required'
        ]);

        ModelsUser::create($validate);
        session()->flash('message','berhasil nambah');
    }
     public function destroy($id){
        $user = ModelsUser::find($id);
        $user->delete();
        session()->flash('message','berhasil menghapus data');
    }

    
    public function edit($id){
        $user = ModelsUser::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->idEdit = $user->id;
        $this->editCheck = true;
    }
    

    public function clear(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->idEdit = '';
        $this->editCheck = false;
    }

    public function update($id){
        $validate = $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password' => 'required'
        ]);

        $position = ModelsUser::find($id);
        $position->update($validate);
        session()->flash('message','berhasil update data');
        $this->clear();
    }

}
