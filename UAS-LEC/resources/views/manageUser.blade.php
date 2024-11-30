
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
    <div>
        @if(session('success'))
            <div class="fixed top-4 right-4 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg w-full sm:w-auto">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium">
                        {{ session('success') }}
                    </span>
                    <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.style.display='none';">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6">Akun yang terdaftar</h1>
        @if($users->isEmpty())
            <p class="text-gray-600">Belum ada pengguna yang terdaftar.</p>
        @else
            <div id="UserTable" class="overflow-x-visible">
                <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg overflow-hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NAMA</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verifikasi pada </th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">{{ $user->email }}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                        {{ $user->email_verified_at->format('Y-m-d H:i:s') }}
                                    @else
                                        Belum Diverifikasi
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-700">
                                <div class="flex space-x-2">
                                    <!-- Edit button with orange background -->
                                    <button class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-lg openEditModalBtn"
                                        data-id="{{ $user->id }}" 
                                        data-name="{{ $user->name }}" 
                                        data-email="{{ $user->email }}"
                                        data-verified-at="{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d\TH:i') : 'Belum Diverifikasi' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                            <g class="edit-outline">
                                                <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                                    <path d="M2 6.857A4.857 4.857 0 0 1 6.857 2H12a1 1 0 1 1 0 2H6.857A2.857 2.857 0 0 0 4 6.857v10.286A2.857 2.857 0 0 0 6.857 20h10.286A2.857 2.857 0 0 0 20 17.143V12a1 1 0 1 1 2 0v5.143A4.857 4.857 0 0 1 17.143 22H6.857A4.857 4.857 0 0 1 2 17.143z" />
                                                    <path d="m15.137 13.219l-2.205 1.33l-1.033-1.713l2.205-1.33l.003-.002a1.2 1.2 0 0 0 .232-.182l5.01-5.036a3 3 0 0 0 .145-.157c.331-.386.821-1.15.228-1.746c-.501-.504-1.219-.028-1.684.381a6 6 0 0 0-.36.345l-.034.034l-4.94 4.965a1.2 1.2 0 0 0-.27.41l-.824 2.073a.2.2 0 0 0 .29.245l1.032 1.713c-1.805 1.088-3.96-.74-3.18-2.698l.825-2.072a3.2 3.2 0 0 1 .71-1.081l4.939-4.966l.029-.029c.147-.15.641-.656 1.24-1.02c.327-.197.849-.458 1.494-.508c.74-.059 1.53.174 2.15.797a2.9 2.9 0 0 1 .845 1.75a3.15 3.15 0 0 1-.23 1.517c-.29.717-.774 1.244-.987 1.457l-5.01 5.036q-.28.281-.62.487m4.453-7.126s-.004.003-.013.006z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg openDeleteModalBtn"
                                        data-id="{{ $user->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd" d="M5.75 3V1.5h4.5V3zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</main>

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
        <!-- The form will submit via PUT -->
        <form id="editUserForm" method="POST" action="{{ route('users.update', ':id') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="userId" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="userId" name="userId" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" readonly>
            </div>
            <div class="mb-4">
                <label for="editName" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="editName" name="name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="editEmail" name="email" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="editVerifiedAt" class="block text-sm font-medium text-gray-700">Verifikasi pada</label>
                <input type="datetime-local" id="editVerifiedAt" name="email_verified_at" class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
            </div>
            <div class="flex justify-end space-x-4 font-semibold">
                <button 
                    type="button" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    id="closeModalBtn">
                    Tutup
                </button>
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-2xl font-semibold mb-4">Hapus User</h2>
        <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.</p>
        <form id="deleteUserForm" method="POST" action="{{ route('users.destroy', ':id') }}">
            @csrf
            @method('DELETE')

            <div class="flex justify-end space-x-4 font-semibold">
                <button 
                    type="button" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    id="closeDeleteModalBtn">
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Mengambil elemen modal dan tombol
    const deleteModal = document.getElementById('deleteModal');
    const closeDeleteModalBtn = document.getElementById('closeDeleteModalBtn');
    const openDeleteModalBtns = document.querySelectorAll('.openDeleteModalBtn');
    const deleteUserForm = document.getElementById('deleteUserForm');

    // Menangani klik pada tombol delete
    openDeleteModalBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            const formAction = deleteUserForm.getAttribute('action').replace(':id', userId);
            deleteUserForm.setAttribute('action', formAction);
            
            // Menampilkan modal
            deleteModal.classList.remove('hidden');
        });
    });

    // Menangani klik pada tombol close (Cancel)
    closeDeleteModalBtn.addEventListener('click', function() {
        deleteModal.classList.add('hidden');
    });

    // Menangani klik pada area luar modal untuk menutup modal
    window.addEventListener('click', function(event) {
        if (event.target === deleteModal) {
            deleteModal.classList.add('hidden');
        }
    });
</script>

@endsection

