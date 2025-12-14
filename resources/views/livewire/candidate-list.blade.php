<x-app-layout>
<div>
    <div class="w-full h-full bg-blue-700 text-white flex justify-center items-center py-10">
            <div>
        <img src="{{ asset('storage/osis2.png') }}"
            class="rounded-full w-16 h-16 mx-auto mt-10" alt="">
    </div>
        <div>
            <h1 class="text-6xl font-bold pt-14">PEMILIHAN KETUA</h1>
            <h1 class="text-6xl font-bold items-center justify-center">OSIS 2025/2026</h1>
            <p class="pt-16 text-xl">Suara Anda Menentukan Masa Depan Sekolah Ini</p>
            <p class="pt-2 text-xl items-center">Pilih Kadidat Secara Bijak</p>
        </div>
    </div>

    <div>
        <h1>Aturan Voting</h1>
        <p>Voting tidak bisa diubah kembali</p>
        <p>Setiap memilih hanya diberikan kesempatan satu kali</p>
        <p>Pastikan membaca visi misi setiap kadidat</p>
        <p>Data anda akan dijaga kerahasiaan</p>
    </div>

    <div>
        <h1>Daftar Kadidat</h1>

        <div class="flex gap-4">
            <div class="w-1/2">
                <img src="{{ asset('storage/istockphoto-2218401959-612x612.jpg') }}" alt="Paslon 1" class="w-64 h-64 object-cover rounded-lg">
            </div>
            <div class="w-1/2">
                <h1>Paslon 1</h1>
                <h2>Visi</h2>
                <p>Membangun masa depan yang lebih baik</p>
                <h2>Misi</h2>
                <p>Membangun masa depan yang lebih baik</p>
            </div>
        </div>

        <div>
            <h1>Paslon 2</h1>
        </div>

        <div>
            <h1>Paslon 3</h1>
        </div>
    </div>

    <div class="flex justify-center py-20">
        <button class="px-6 py-3 bg-white text-blue-700 rounded-lg"
        wire:click="$set(showModal, true)">
        Pilih Kandidat</button>
    </div>

        {{-- <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-1/2">
                <h2 class="text-xl font-bold mb-4">Konfirmasi Pilihan Anda</h2>
                <p>Apakah Anda yakin memilih kandidat ini?</p>
                <div class="mt-6 flex justify-end gap-4">
                    <button class="px-4 py-2 bg-gray-300 rounded-lg" wire:click="$set('showModal', false)">Batal</button>
                    <button class="px-4 py-2 bg-blue-700 text-white rounded-lg" wire:click="confirmVote">Ya, Pilih Kandidat Ini</button>
                </div>
            </div>
        </div> --}}
        
    {{-- @endif --}}
</div>
</x-app-layout>