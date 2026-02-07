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
    public $jumlah_user = null;

    protected $rules = [
        'jumlah_user' => 'required|integer|min:1|max:500',
    ];

    public function generateUsers()
    {
        try {
        $this->validate();
    } catch (\Illuminate\Validation\ValidationException $e) {
        $this->dispatch('alert', [
            'type' => 'warning',
            'message' => 'Jumlah user tidak boleh kosong!',
        ]);
        throw $e;
    }

    for ($i = 0; $i < $this->jumlah_user; $i++) {
        $token = $this->generateToken();
        $password = $this->generatePassword();

        User::create([
            'token' => $token,
            'password' => Hash::make($password),
            'plain_password' => $password,
        ]);
    }

        $this->validate();

        $this->resetForm();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'User berhasil ditambahkan!']);

    }

    private function generateToken($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $token;
    }

    private function generatePassword()
    {
        // Password: 6 digit angka acak
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function resetForm()
    {
        $this->jumlah_user = null;
    }

    public function render()
    {
        $users = User::orderBy('id', 'asc')->get()->map(function ($user) {
            return [
                'token' => $user->token,
                'password' => $user->plain_password ?? '******', // fallback jika null
            ];
        })->toArray();
        
        return view('livewire.admin.create-user', [
        'users' => $users]);
    }
}
