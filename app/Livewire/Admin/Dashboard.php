<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;

use Livewire\Attributes\Layout;
use phpDocumentor\Reflection\Types\This;

#[Layout('components.admin-layout')]
class Dashboard extends Component
{
    public $totalUsers;
    public $voted;
    public $notVoted;
    public $candidateNames = [];
    public $voteCounts = [];
    public $percentages = [];
    public $totalVotes;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->totalUsers = User::count();
        $this->voted = User::where('has_voted', true)->count();
        $this->notVoted = $this->totalUsers - $this->voted;

        // Hitung suara per kandidat
        $candidates = Candidate::withCount('votes')->get();

        $this->candidateNames = $candidates->pluck('name')->toArray();
        $this->voteCounts = $candidates->pluck('votes_count')->toArray();

        // Hitung persentase
        $totalVotes = array_sum($this->voteCounts);
        $this->percentages = array_map(function($count) use ($totalVotes) {
        return $totalVotes > 0 ? round(($count / $totalVotes) * 100, 1) : 0;
    }, $this->voteCounts);
    
    $this->dispatch('refresh-charts');
    }

    public function refreshData()
    {
        $this->loadData();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
