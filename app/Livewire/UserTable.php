<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{

    public $search = '' ;
    public $filter = '' ;

    public function render()
    {
        return view('livewire.user-table',[
            'users' => User::where('name','like','%'.$this->search.'%')->where('is_admin','like','%'.$this->filter.'%')->paginate(10)
            
        ]);
    }
}
