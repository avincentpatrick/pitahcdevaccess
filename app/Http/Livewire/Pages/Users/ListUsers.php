<?php

namespace App\Http\Livewire\Pages\Users;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Userlevel;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListUsers extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $searchInput;
    protected $searchList;
    protected $pagination = 5;
    public $search = "";
   
    public $selectedOffice = NULL;
    public $selectedUserlevelAssigned = NULL;
    
    public $showUserModal = false;
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $user;
    public $userid;
    public $last_name;
    public $first_name;
    public $email;
    public $office;
    public $userlevel;
    public $userlevel_id;
    public $email_verification_details;
    public $name_details;
    public $email_details;
    public $office_details;
    public $userlevel_details;

    public function ActivateUserForm(User $user)
    {
        $this->user = $user;
        $this->email_verification_details = $user->email_verified_at;
        $this->userlevel_details = NULL;
        $this->name_details = $user->last_name.', '.$user->first_name;
        $this->email_details = $user->email;
        $this->office_details = optional($user->office)->office_name;
        $this->showUserModal = true;
        $this->dispatchBrowserEvent('show-form');
    }

    public function DeactivateUserForm(User $user)
    {
        $this->user = $user;
        $this->email_verification_details = $user->email_verified_at;
        $this->userlevel_details = $user->userlevel->userlevel_name;
        $this->name_details = $user->last_name.', '.$user->first_name;
        $this->email_details = $user->email;
        $this->office_details = optional($user->office)->office_name;
        $this->showUserModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function ActivateUser()
    {
        $this->validate([
            'userlevel_id' => 'required'
        ]);
        $this->user->update([
            'userlevel_id' => $this->userlevel_id,
            'updated_by' => Auth::user()->id,
        ]);    
        $this->dispatchBrowserEvent('success-message', ['message' => 'User Activated Successfully!']); 
        return redirect()->back(); 
    }

    public function DeactivateUser()
    {
        $this->user->update([
            'userlevel_id' => NULL
        ]);    
        $this->dispatchBrowserEvent('error-message', ['message' => 'User Deactivated Successfully!']); 
        return redirect()->back(); 
    }

    public function render()
    {  
        if( Auth::user()->userlevel_id == 1 )
        {
            $userlevels_set = Userlevel::all();
        }elseif( Auth::user()->userlevel_id == 2 ){
            $userlevels_set = Userlevel::where('id', 3)->get();
        }
        return view('livewire.pages.users.list-users', 
        [
            'useraccounts' => $this->users,
            'offices' => Office::all(),
            'assigned_userlevels' => $userlevels_set,
        ]);
    }

    public function getUsersProperty()
    {
        if( Auth::user()->userlevel_id == 1 )
        {
            return $this->usersQuery
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);    
        }elseif( Auth::user()->userlevel_id == 2 ){
            return $this->usersQuery
            ->where("userlevel_id", 3)
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);    
        }
    }

    public function getUsersQueryProperty()
    {
        return User::with(['userlevel', 'office'])
            ->when($this->selectedUserlevelAssigned, function ($query) {
                $query->where('userlevel_id', $this->selectedUserlevelAssigned);
            })
            ->when($this->selectedOffice, function ($query) {
                $query->where('office_id', $this->selectedOffice);
            })
            ->search(trim($this->search));
    }
}
