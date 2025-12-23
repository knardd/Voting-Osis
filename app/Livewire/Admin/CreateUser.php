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
        $nis = $this->generateNis();
        $password = $this->generatePassword();

        User::create([
            'nis' => $nis,
            'password' => Hash::make($password),
            'plain_password' => $password,
        ]);
    }

        $this->validate();

        $this->resetForm();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'User berhasil ditambahkan!']);

    }

    private function generateNis()
    {
        // Format NIS: 8 digit angka acak
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    private function generatePassword()
    {
        // Password: 8 digit angka acak
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
                'nis' => $user->nis,
                'password' => $user->plain_password ?? '******', // fallback jika null
            ];
        })->toArray();
        
        return view('livewire.admin.create-user', [
        'users' => $users]);
    }
}
