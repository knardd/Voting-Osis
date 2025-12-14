<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold">Kelola User Siswa</h1>
                </div>

                <!-- Form Tambah User -->
                <div class="bg-gray-50 p-6 rounded-lg mb-8">
                    <h2 class="text-xl font-semibold mb-4">Tambah User Baru</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Masukkan NIS" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Siswa</label>
                            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            + Tambah User
                        </button>
                    </form>
                </div>

                <!-- Daftar User -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Daftar User Siswa</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-3 text-left">No</th>
                                    <th class="border p-3 text-left">NIS</th>
                                    <th class="border p-3 text-left">Nama</th>
                                    <th class="border p-3 text-left">Status</th>
                                    <th class="border p-3 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50">
                                    <td class="border p-3">1</td>
                                    <td class="border p-3">001</td>
                                    <td class="border p-3">Aldi Pratama</td>
                                    <td class="border p-3"><span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">Active</span></td>
                                    <td class="border p-3">
                                        <button class="bg-yellow-500 text-white px-3 py-1 rounded text-sm mr-2 hover:bg-yellow-600">Edit</button>
                                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
