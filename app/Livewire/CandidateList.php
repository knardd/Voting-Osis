<?php

namespace App\Livewire;

use App\Models\Vote;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CandidateList extends Component
{
    public $showModal = false;
    public $selectedCandidate = null;
    public $voteSuccess = false;
    
    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function selectCandidate($candidateId)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Validasi: cek apakah user sudah login
        if (!$user) {
            session()->flash('error', 'Silakan login terlebih dahulu');
            return redirect()->route('login');
        }

        // Validasi: cek apakah user sudah vote
        if ($user->has_voted) {
            session()->flash('error', 'Anda sudah melakukan voting sebelumnya');
            return redirect()->back();
        }

        try {
            DB::transaction(function () use ($candidateId, $user) {
                // Simpan vote
                Vote::create([
                    'user_id' => $user->id,
                    'candidate_id' => $candidateId,
                ]);

                // Update status has_voted menggunakan DB query langsung
                // Cara 1: Menggunakan DB query (lebih reliable di dalam transaction)
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['has_voted' => true, 'updated_at' => now()]);
                
                // ATAU Cara 2: Refresh model lalu save (pilih salah satu)
                // $user->refresh();
                // $user->has_voted = true;
                // $user->save();
            });

            session()->flash('success', 'Vote berhasil disimpan!');
            return redirect()->route('vote.success');
            
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Voting Error: ' . $e->getMessage());
            
            session()->flash('error', 'Terjadi kesalahan saat menyimpan vote: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function render()
    {
        // Ambil semua candidate untuk ditampilkan
        $candidates = \App\Models\Candidate::all();
        
        return view('livewire.candidate-list', [
            'candidates' => $candidates
        ]);
    }
}
