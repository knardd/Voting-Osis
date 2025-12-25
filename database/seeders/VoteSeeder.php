<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = Candidate::pluck('id');

        User::factory(150)->create()->each(function ($user) use ($candidates) {
            Vote::create([
                'user_id' => $user->id,
                'candidate_id' => $candidates->random(),
            ]);
        });
        
    }
}
