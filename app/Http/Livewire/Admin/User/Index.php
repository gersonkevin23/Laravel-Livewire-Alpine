<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users;
    public $remove_user;
    public $confirmingUserRemoval = false;
    public function mount(){
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.admin.user.index');
    }
    public function destroy($user,$confirm = false){
        if($confirm == 'yes'){
            $this->confirmingUserRemoval = false;
            $this->remove_user->delete();
            $this->mount();
        }elseif ($confirm == 'no'){
            $this->confirmingUserRemoval = false;
        }else{
            $this->confirmingUserRemoval = true;
            $this->remove_user = User::find($user);
        }

    }

}
