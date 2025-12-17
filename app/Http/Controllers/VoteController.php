<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function candidatePage()
    {
        // PASTIKAN AUTH MIDDLEWARE
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.page');
        }

        // Cek apakah user sudah vote
        $hasVoted = $user->has_voted;

        $candidates = Candidate::all();
        return view('candidate', compact('candidates', 'hasVoted'));
    }

    public function vote(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login.page');
        }

        if ($user->has_voted) {
            return back()->with('error', 'Anda sudah vote!');
        }

        $request->validate([
            'candidate_id' => 'required|exists:candidates,id'
        ]);

        DB::transaction(function () use ($user, $request) {
            // Simpan vote
            Vote::create([
                'user_id' => $user->id,
                'candidate_id' => $request->candidate_id
            ]);

            // Tambah vote count kandidat
            Candidate::where('id', $request->candidate_id)->increment('vote_count');

            // Update status user
            $user->update(['has_voted' => true]);
            $user->save();
        });

        return redirect()->route('vote.success');
    }
}

