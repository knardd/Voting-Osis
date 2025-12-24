<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-blue-700 mb-2">User Management</h2>
    <p class="text-sm text-gray-600 mb-6">Kelola pembuatan akun pengguna secara massal</p>

    <!-- Form Generate -->
    <div class="bg-blue-50 p-4 rounded-lg mb-6">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <h3 class="font-semibold text-blue-700">Buat User Banyak Sekaligus</h3>
        </div>

        <div class="flex items-center gap-3">
            <div class="">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah User</label>
                <input
                    type="number"
                    wire:model.defer="jumlah_user"
                    placeholder="Masukkan jumlah user"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                <p class="text-xs text-gray-500 mt-1">Maksimal 500 user per batch</p>
            </div>

            <button
                wire:click="generateUsers"
                wire:loading.attr="disabled"
                class="w-36 h-10 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-200 flex items-center justify-center gap-2"
            >
                <!-- Idle State -->
                <span wire:loading.remove wire:target="generateUsers" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Generate User</span>
                </span>

                <!-- Loading State -->
                <span wire:loading wire:target="generateUsers" class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-white animate-spin" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Simpler Tailwind-friendly spinner -->
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span></span>
                </span>
            </button>
        </div>
    </div>

    <!-- Tabel Hasil -->
    @if(count($users) > 0)
        <div class="mt-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-semibold text-gray-700">Daftar User yang Dibuat</h4>
                <button class="px-3 py-1 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-xls">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                        <path d="M4 15l4 6" />
                        <path d="M4 21l4 -6" />
                        <path d="M17 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                        <path d="M11 15v6h3" />
                    </svg>
                    <span class="font-semibold">Export Excel</span>
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $index => $user)
                            <tr>
                                <td class="py-3 px-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 text-sm font-mono text-gray-900">{{ $user['nis'] }}</td>
                                <td class="py-3 px-4 text-sm font-mono text-gray-900">{{ $user['password'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div
        x-data="{
            show: false,
            message: '',
            type: 'success',
            getTitle() {
                return {
                    'success': 'Success alert! ',
                    'warning': 'Warning alert! ',
                }[this.type] || 'Info';
                }
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
                'bg-success-soft text-fg-success-strong': type === 'success',
                'bg-danger-soft text-fg-danger-strong': type === 'warning',
            }"
            role="alert"
        >
            <span class="font-medium" x-text="getTitle()"></span>
            <span x-text="message"></span>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</div>