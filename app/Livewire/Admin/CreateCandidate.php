<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


#[Layout('components.admin-layout')]
class CreateCandidate extends Component
{
    use WithFileUploads;

    public $name, $visi, $misi, $photo, $candidateId;
    public $currentPhoto;
    public $candidates;

    protected $rules = [
        'name' => 'required|string|max:255',
        'visi' => 'required|string',
        'misi' => 'required|string',
        'photo' => 'required|image|max:2048', // max 2MB
    ];

    public function mount()
    {
        $this->loadCandidates();
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::orderBy('id')->get();
    }

    public function store()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('candidates', 'public');
        }

        Candidate::create([
            'name' => $this->name,
            'visi' => $this->visi,
            'misi' => $this->misi,
            'photo' => $photoPath,
        ]);

        $this->resetForm();
        $this->loadCandidates();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Kandidat berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        $candidate = Candidate::find($id);
        if ($candidate) {
            $this->candidateId = $candidate->id;
            $this->name = $candidate->name;
            $this->visi = $candidate->visi;
            $this->misi = $candidate->misi;
            $this->photo = null;
            $this->currentPhoto = $candidate->photo;
        }
    }

    public function update()
    {
        $rules = [
        'name' => 'required|string|max:255',
        'visi' => 'required|string',
        'misi' => 'required|string',
    ];

    if ($this->photo instanceof UploadedFile) {
        $rules['photo'] = 'image|max:2048';
    }

        $this->validate($rules);

        $candidate = Candidate::find($this->candidateId);
        if (!$candidate) return;

        $photoPath = $candidate->photo;
        if ($this->photo instanceof UploadedFile) {
            // Hapus foto lama
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }
            $photoPath = $this->photo->store('candidates', 'public');
        }

        $candidate->update([
            'name' => $this->name,
            'visi' => $this->visi,
            'misi' => $this->misi,
            'photo' => $photoPath,
        ]);

        $this->resetForm();
        $this->loadCandidates();
        $this->dispatch('alert', ['type' => 'update', 'message' => 'Kandidat berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        if ($candidate) {
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }
            $candidate->delete();
            $this->loadCandidates();
            $this->dispatch('alert', ['type' => 'delete', 'message' => 'Kandidat berhasil dihapus!']);
        }
    }

    public function removePhoto()
    {
        $this->photo = null;
        $this->currentPhoto = null;
    }

    public function cancel()
    {
        $this->photo = null;
    }

    public function resetForm()
    {
        $this->reset(['name', 'visi', 'misi', 'photo', 'currentPhoto', 'candidateId']);
    }

    public function render()
    {
        return view('livewire.admin.create-candidate');
    }
}
