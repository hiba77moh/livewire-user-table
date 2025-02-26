<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class UserTable extends Component
{

    use WithPagination ;

    #[Url(history:true)]
    public $search = '' ;
    
    #[Url(history:true)]
    public $filter ;

    #[Url(history:true)]
    public $id ;

    #[Url(history:true)]
    public $perPage  = 10 ;

    #[Url(history:true)]
    public $sortBy = 'name';

    #[Url(history:true)]
    public $sortDir= 'asc';

    public function delete($id){
        User::find($id)->delete();
    }

    public function setSortBy($sortBy){
        $this->sortBy = $sortBy;
        $this->sortDir = $this->sortDir === 'asc'? 'desc' : 'asc';
    }

    // the name fo the function should be updated + the name of the variable you want to reset
    public function updatedSearch(){
        $this->resetPage();
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
