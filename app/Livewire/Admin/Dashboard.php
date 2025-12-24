<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Vote; // Pastikan Model Vote diimport
use App\Models\Candidate;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.admin-layout')]
#[Title('Dashboard Voting')]
class Dashboard extends Component
{
    public $totalUsers = 0;
    public $voted = 0;
    public $notVoted = 0;
    public $totalVotes = 0;
    public $candidates = [];
    public $pieChartGradient = ''; // String untuk CSS Conic Gradient
    public $maxVotes = 0;

    // Definisi warna tetap agar konsisten antara Bar dan Pie Chart
    // Format: [Tailwind Class, Hex Code]
    protected $colorPalette = [
        ['bg-blue-500', '#3b82f6'],   // Kandidat 1
        ['bg-purple-500', '#a855f7'], // Kandidat 2
        ['bg-pink-500', '#ec4899'],   // Kandidat 3
        ['bg-teal-500', '#14b8a6'],   // Kandidat 4
        ['bg-amber-500', '#f59e0b'],  // Kandidat 5
    ];

    public function mount()
    {
        $this->loadData();
    }

    // Fungsi ini akan dipanggil otomatis oleh wire:poll
    public function loadData()
    {
        // 1. Ambil Statistik Dasar
        $this->totalUsers = User::count();
        $this->voted = Vote::distinct('user_id')->count('user_id');
        $this->notVoted = $this->totalUsers - $this->voted;

        // 2. Ambil Kandidat & Hitung Suara
        $candidatesData = Candidate::withCount('votes')->get();
        $this->totalVotes = $candidatesData->sum('votes_count');
        $this->maxVotes = $candidatesData->max('votes_count') ?: 1;

        // 3. Proses Data Kandidat & Siapkan Visualisasi
        $processedCandidates = [];
        $gradientStops = [];
        $currentAngle = 0;

        foreach ($candidatesData as $index => $candidate) {
            // Assign warna berdasarkan urutan (looping jika lebih dari 5)
            $colorIndex = $index % count($this->colorPalette);
            $colorClass = $this->colorPalette[$colorIndex][0];
            $colorHex = $this->colorPalette[$colorIndex][1];

            // Hitung Persentase
            $percentage = $this->totalVotes > 0 
                ? round(($candidate->votes_count / $this->totalVotes) * 100, 1) 
                : 0;

            $heightPercentage = ($candidate->votes_count / $this->maxVotes) * 100;

            // Masukkan ke array kandidat untuk View
            $processedCandidates[] = [
                'name' => $candidate->name,
                'votes' => $candidate->votes_count,
                'percentage' => $percentage,
                'height' => round($heightPercentage),
                'color_class' => $colorClass,
                'color_hex' => $colorHex,
            ];

            // Siapkan String Conic Gradient untuk Pie Chart
            if ($this->totalVotes > 0) {
                $endAngle = $currentAngle + $percentage;
                // Syntax: color start% end%
                $gradientStops[] = "{$colorHex} {$currentAngle}% {$endAngle}%";
                $currentAngle = $endAngle;
            }
        }

        $this->candidates = $processedCandidates;
        
        // Gabungkan string gradient atau gunakan warna abu-abu jika belum ada suara
        $this->pieChartGradient = $this->totalVotes > 0 
            ? implode(', ', $gradientStops) 
            : '#e5e7eb 0% 100%'; // Abu-abu default
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}