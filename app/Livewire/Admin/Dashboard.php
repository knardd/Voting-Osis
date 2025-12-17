<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Layout;

#[Layout('components.admin-layout')]
class Dashboard extends Component
{
    public function render()
    {
        $totalUsers = User::count();
        $voted = User::where('has_voted', true)->count();
        $notVoted = $totalUsers - $voted;

        // Hitung suara per kandidat
        $candidates = Candidate::withCount('votes')->get();
        $candidateNames = $candidates->pluck('name')->toArray();
        $voteCounts = $candidates->pluck('votes_count')->toArray();

        // Hitung persentase
        $totalVotes = array_sum($voteCounts);
        $percentages = $totalVotes > 0
            ? array_map(fn($v) => round(($v / $totalVotes) * 100, 1), $voteCounts)
            : array_fill(0, count($voteCounts), 0);

        return view('livewire.admin.dashboard', compact(
            'totalUsers', 'voted', 'notVoted',
            'candidateNames', 'voteCounts', 'percentages'
        ));
    }
}
