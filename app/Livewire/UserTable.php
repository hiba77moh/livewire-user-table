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
    public $perPage  = 10 ;

    // public function delete(){
    //     User::find($id)->delete();
    // }

    public function render()
    {
        return view('livewire.user-table',[
            'users' => User::where('name','like','%'.$this->search.'%')->paginate($this->perPage) ,
        ]);
        // ->where('is_admin','like','%'.$this->filter.'%')
    }
}
