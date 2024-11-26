@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Registered Account</h1>
        @if($users->isEmpty())
            <p class="text-gray-600">No users have registered yet.</p>
        @else
            <div id="UserTable" class="overflow-x-visible">
                <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg overflow-hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">{{ $user->created_at }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">
                                <div class="flex space-x-2">
                                    <!-- Edit button with orange background -->
                                    <button class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-lg">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <g class="edit-outline">
                                          <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                            <path d="M2 6.857A4.857 4.857 0 0 1 6.857 2H12a1 1 0 1 1 0 2H6.857A2.857 2.857 0 0 0 4 6.857v10.286A2.857 2.857 0 0 0 6.857 20h10.286A2.857 2.857 0 0 0 20 17.143V12a1 1 0 1 1 2 0v5.143A4.857 4.857 0 0 1 17.143 22H6.857A4.857 4.857 0 0 1 2 17.143z" />
                                            <path d="m15.137 13.219l-2.205 1.33l-1.033-1.713l2.205-1.33l.003-.002a1.2 1.2 0 0 0 .232-.182l5.01-5.036a3 3 0 0 0 .145-.157c.331-.386.821-1.15.228-1.746c-.501-.504-1.219-.028-1.684.381a6 6 0 0 0-.36.345l-.034.034l-4.94 4.965a1.2 1.2 0 0 0-.27.41l-.824 2.073a.2.2 0 0 0 .29.245l1.032 1.713c-1.805 1.088-3.96-.74-3.18-2.698l.825-2.072a3.2 3.2 0 0 1 .71-1.081l4.939-4.966l.029-.029c.147-.15.641-.656 1.24-1.02c.327-.197.849-.458 1.494-.508c.74-.059 1.53.174 2.15.797a2.9 2.9 0 0 1 .845 1.75a3.15 3.15 0 0 1-.23 1.517c-.29.717-.774 1.244-.987 1.457l-5.01 5.036q-.28.281-.62.487m4.453-7.126s-.004.003-.013.006z" />
                                          </g>
                                        </g>
                                      </svg>
                                    </button>
                                    <!-- Trash button with red background -->
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
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
<script>
$(document).ready(function() {
    $('#UserTable table').DataTable(); 
});

</script>
@endsection

