<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination ;

    public $search = '' ;
    public $filter ;
    public $id ;
    public $perPage  = 10 ;

    public $sortBy = 'name';
    public $sortDir= 'asc';

    public function delete($id){
        User::find($id)->delete();
    }

    public function setSortBy($sortBy){
        $this->sortBy = $sortBy;
        $this->sortDir = $this->sortDir === 'asc'? 'desc' : 'asc';
    }

    public function render()
    {
        return view('livewire.user-table',[
            // 'users' => User::where('is_admin','like','%'.$this->filter.'%')->where('name','like','%'.$this->search.'%')->paginate($this->perPage) ,
            'users' => User::search($this->search)
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->filter($this->filter)
                    ->paginate($this->perPage)
        ]);
    }
}
