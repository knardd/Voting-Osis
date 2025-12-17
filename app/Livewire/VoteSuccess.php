<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class VoteSuccess extends Component
{
    public function mount()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Kalau BELUM vote, paksa balik ke candidate
    if (!$user->has_voted) {
        abort(403);
        // atau:
        // return redirect()->route('candidate');
    }
}

    public function beranda()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.vote-success');
    }
}
