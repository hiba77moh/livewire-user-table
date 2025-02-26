<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination ;
    public $search = '' ;
    public $filter = '' ;
    public $id ;

    public function delete(){
        User::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.user-table',[
            'users' => User::where('name','like','%'.$this->search.'%')->where('is_admin','like','%'.$this->filter.'%')->paginate(50)
        ]);
    }
}
