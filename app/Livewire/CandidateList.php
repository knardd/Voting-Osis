<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CandidateList extends Component
{
    // Property untuk menampilkan modal
    public $showModal = false;

    // Property untuk menyimpan kandidat yang dipilih
    public $selectedCandidate;

    // Fungsi ketika tombol "Ya, Pilih Kandidat Ini" diklik
    public function confirmVote()
    {
        $user = Auth::user();

        // Cek apakah user sudah vote
        if ($user->has_voted) {
            session()->flash('message', 'Anda sudah melakukan voting!');
            $this->showModal = false;
            return;
        }

        // Simpan vote (contoh)
        \App\Models\Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $this->selectedCandidate,
        ]);

        // Tandai user sudah vote
        $user->has_voted = true;
        $user->save();

        $this->showModal = false;

        session()->flash('message', 'Terima kasih, vote Anda berhasil!');
    }
    public function render()
    {
        return view('livewire.candidate-list');
    }
}
