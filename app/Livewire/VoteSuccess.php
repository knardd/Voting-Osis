<?php

namespace App\Livewire;

use App\Models\Vote;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class VoteSuccess extends Component
{
    public $candidate;
    public function mount()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $vote = Vote::with('candidate')->where('user_id', $user->id)->first();
        $this->candidate = $vote->candidate;
    }
    
    
    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.vote-success', [
            ''
        ]);
    }
}
