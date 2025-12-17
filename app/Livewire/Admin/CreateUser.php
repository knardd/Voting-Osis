<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

#[Layout('components.admin-layout')]
class CreateUser extends Component
{
    public $jumlah_user = 1;
    public $users = [];

    protected $rules = [
        'jumlah_user' => 'required|integer|min:1|max:500',
    ];

    public function generateUsers()
    {
        $this->validate();

        $this->users = [];

        for ($i = 0; $i < $this->jumlah_user; $i++) {
            $nis = $this->generateNis();
            $password = $this->generatePassword();

            $this->users[] = [
                'nis' => $nis,
                'password' => $password,
            ];
        }
    }

    private function generateNis()
    {
        // Format NIS: 8 digit angka acak
        return str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
    }

    private function generatePassword()
    {
        // Password: 8 digit angka acak
        return str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
    }

    public function render()
    {
        return view('livewire.admin.create-user');
    }
}
