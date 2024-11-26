import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Manage User
$(document).ready(function() {
    $('#UserTable table').DataTable(); 
});

document.querySelectorAll('.openEditModalBtn').forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');
        const userName = this.getAttribute('data-name');
        const userEmail = this.getAttribute('data-email');

        const form = document.getElementById('editUserForm');
        form.action = form.action.replace(':id', userId);

        document.getElementById('userId').value = userId;
        document.getElementById('editName').value = userName;
        document.getElementById('editEmail').value = userEmail;

        document.getElementById('editModal').classList.remove('hidden');
    });
});

document.getElementById('closeModalBtn').addEventListener('click', function () {
    document.getElementById('editModal').classList.add('hidden');
});