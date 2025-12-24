<div>
    <div class="flex gap-6">
        <!-- Form (Kiri) -->
        <div class="w-full lg:w-1/2 bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-blue-700 mb-4">
                {{ $candidateId ? 'Edit Kandidat' : 'Tambah Kandidat Baru' }}
            </h2>

            <form wire:submit.prevent="{{ $candidateId ? 'update' : 'store' }}" class="space-y-5">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" wire:model.defer="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Visi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                    <textarea wire:model.defer="visi" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    @error('visi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Misi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Misi
                    </label>
                    <textarea wire:model.defer="misi" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    @error('misi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Foto -->
                <div class="col-span-full">
                    <label for="photo" class="block text-sm font-medium text-gray-900 mb-2">Photo</label>

                    <!-- Input file: SELALU ADA (wajib untuk wire:model) -->
                    <input
                        type="file"
                        id="photo"
                        wire:model="photo"
                        accept="image/jpeg,image/png,image/jpg"
                        class="sr-only" />

                    <!-- Placeholder upload (hanya muncul jika tidak ada foto) -->
                        <div class="mt-2 flex justify-center">
                            <label for="photo" class="relative cursor-pointer flex w-full flex-col items-center justify-center px-2 py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-400 transition-colors">
                                <div wire:target="photo">
                                    <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-300">
                                        <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                    <div class="mt-1 w-full text-center">
                                    <span class="text-xs text-gray-500">Klik untuk upload</span>
                                    <p class="text-xs text-gray-500">Format: JPG/PNG, maks. 2MB</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                    <!-- Preview foto (jika ada) -->
                    @if($photo || $currentPhoto)
                        <div class="mt-4">
                            <div class="relative inline-block">
                            <img src="{{
                                $photo instanceof \Livewire\TemporaryUploadedFile
                                    ? $photo->temporaryUrl()
                                    : asset('storage/' . $currentPhoto)
                            }}"
                            alt="Foto Profil"
                            class="w-32 h-32 rounded-lg object-cover border-2 border-gray-200 shadow-sm">
                            <button
                                type="button"
                                wire:click="cancel"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-all"
                                title="Hapus foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                        </div>
                    @endif


                    <!-- Loading saat upload: SELALU ADA DI DOM -->
                    <div wire:loading wire:target="photo" class="mt-2 flex justify-center">
                        <div class="w-32 h-32 flex items-center justify-center bg-white/80 rounded-lg border-2 border-dashed border-indigo-400">
                            <svg aria-hidden="true" class="w-8 h-8 text-indigo-500 animate-spin mx-auto" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="opacity-25" fill="#9CA3AF" d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"/>
                                <path fill="currentColor" d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"/>
                            </svg>
                        </div>
                    </div>

                    @error('photo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex gap-2 justify-start">
                    <button type="submit" wire:loading.attr="disabled"
                        class="flex items-center justify-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow w-full {{ $candidateId ? 'w-auto' : 'w-full' }}">
                        <span wire:loading.remove wire:target="{{ $candidateId ? 'update' : 'store' }}">
                            {{ $candidateId ? 'Update' : 'Create' }}
                        </span>
                        <span wire:loading wire:target="{{ $candidateId ? 'update' : 'store' }}" class="items-center justify-center flex">
                            <svg aria-hidden="true" class="w-4 h-4 text-neutral-tertiary animate-spin fill-brand me-2" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                        </span>
                    </button>

                    @if ($candidateId)
                        <button type="button" wire:click="resetForm"
                            class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors w-auto">
                            Cancel
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <!-- Daftar Kandidat (Kanan) -->
        <div class="w-full lg:w-1/2">
            <div class="bg-white rounded-xl shadow-md p-6 h-fit">
                <h2 class="text-2xl font-bold text-blue-700 mb-4">Daftar Kandidat</h2>

                @if ($candidates->count() === 0)
                    <p class="text-gray-500 text-center py-6">Belum ada kandidat.</p>
                @else
                    <div class="space-y-4 max-h-[600px] overflow-y-auto pr-2">
                        @foreach ($candidates as $candidate)
                            <div class="flex items-center gap-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <!-- Foto Profil -->
                                <div class="flex-shrink-0">
                                    @if($candidate->photo)
                                        <img src="{{ asset('storage/' . $candidate->photo) }}"
                                            alt="{{ $candidate->name }}"
                                            class="w-14 h-14 rounded-full object-cover border">
                                    @else
                                        <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500 font-bold">{{ substr($candidate->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Info -->
                                <div class="flex-grow">
                                    <h3 class="font-semibold text-gray-800">{{ $candidate->name }}</h3>
                                    <p class="text-sm text-gray-600 line-clamp-1">{{ Str::limit($candidate->visi, 40) }}</p>
                                </div>

                                <!-- Aksi -->
                                <div class="flex gap-2">
                                    <button wire:click="edit({{ $candidate->id }})"
                                        class="p-1.5 text-blue-600 hover:bg-blue-100 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button wire:click="destroy({{ $candidate->id }})"
                                        class="p-1.5 text-red-600 hover:bg-red-100 rounded-full"
                                        onclick="return confirm('Yakin hapus kandidat ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Alert Dinamis -->
<div
    x-data="{ 
        show: false, 
        message: '',
        type: 'success'
    }"
    @alert.window="
        message = $event.detail[0]?.message || '';
        type = $event.detail[0]?.type || 'success';
        show = true;
        setTimeout(() => show = false, 5000);
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-cloak
    class="fixed top-4 left-1/2 transform -translate-x-1/2 z-[9999] max-w-md"
>
    <div 
        class="p-4 text-sm rounded-base shadow-lg"
        :class="{
            'bg-success-soft text-fg-success-strong': type === 'success' || type === 'update',
            'bg-danger-soft text-fg-danger-strong': type === 'delete',
        }"
        role="alert"
    >
        <span class="font-medium" x-text="getTitle()"></span>
        <span x-text="message"></span>
    </div>

    <!-- Function helper untuk title dinamis -->
    <script>
        function getTitle() {
            const titles = {
                'success': 'Success alert!',
                'update': 'Updated!',
                'delete': 'Deleted!',
            };
            return titles[this.type] || 'Success alert!';
        }
    </script>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
</div>
