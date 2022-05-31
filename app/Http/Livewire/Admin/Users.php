<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User as UsersModel;

class Users extends Component
{
    public $bShowModal = false;
    public $iId = 0;
    public $name = '';
    public $email = '';
    public $role = '';

    public $aUserRule = [
        'name'  => 'required',
        'email' => 'required',
        'role'  => 'required',
    ];

    protected $listeners = ['showEditModal', 'toggleActiveStatus', ];
    public function render()
    {
        return view('livewire.admin.users');
    }

    public function showEditModal($iId)
    {
        $this->bShowModal = true;
        $this->iId = $iId;
        $oUsers = UsersModel::find($iId);
        $this->name = $oUsers->name;
        $this->email = $oUsers->email;
        $this->role = $oUsers->role;
    }

    public function addUser()
    {
        $this->bShowModal = true;
        $this->iId = 0;
        $this->name = '';
        $this->email = '';
        $this->role = '';
    }

    public function save()
    {
        $this->validate($this->aUserRule);
        $oUsers = ($this->iId === 0 || intval($this->iId) <= 0) ? new UsersModel() : UsersModel::find($this->iId);
        $oUsers->name = $this->name;
        $oUsers->email = $this->email;
        $oUsers->role = $this->role;
        $oUsers->password = 'default-' . bcrypt(time() * (time() - rand(1, 100)));

        $oUsers->save();
        $this->bShowModal = false;
        $this->iId = 0;
        $this->emit('refreshDatatable');
    }

    public function toggleActiveStatus($iId)
    {
        $oUsers = UsersModel::find($iId);
        $oUsers->is_active = !$oUsers->is_active;
        $oUsers->save();
        $this->iId = 0;
        $this->emit('refreshDatatable');
    }
}
