<?php

namespace App\Livewire\User;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AddUserModal extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $role;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'role' => 'required|string',
    ];

    protected $listeners = [
        'delete_user' => 'deleteUser',
        'update_user' => 'updateUser',
        'new_user' => 'hydrate',
    ];

    public function render()
    {
        $roles = Role::all();

        return view('livewire.user.add-user-modal', compact('roles'));
    }
    public function submit()
    {
        $this->validate();
        // Validate the form input data
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
            ];

            $data['password'] = Hash::make($this->email);

            // Update or Create a new user record in the database
            $data['email'] = $this->email;

            $admin = Admin::find($this->user_id) ?? Admin::create($data);

            $admin->assignRole($this->role);

            $this->dispatch('success', __('New admin created'));
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteUser($id)
    {
        // Prevent deletion of current user
        if ($id == Auth::id()) {
            $this->dispatch('error', 'User cannot be deleted');
            return;
        }

        // Delete the user record with the specified ID
        Admin::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'User successfully deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }
}
