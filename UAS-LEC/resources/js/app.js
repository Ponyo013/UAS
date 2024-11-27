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

// Newsletter
$(document).ready(function() {
    $('#NewsletterTable table').DataTable(); 
});

document.getElementById('createNewsletterBtn').addEventListener('click', function() {
    document.getElementById('createNewsletterModal').classList.remove('hidden');
});

document.getElementById('closeModalBtn').addEventListener('click', function () {
    document.getElementById('createNewsletterModal').classList.add('hidden');
});

document.addEventListener('DOMContentLoaded', () => {
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Tulis Deskripsi di sini...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],       
                ['blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ align: [] }],
                ['link', 'image', 'video'],
                ['clean']                                        
            ]
        }
    });

    quill.on('text-change', function() {
        const descriptionInput = document.querySelector('#description');
        descriptionInput.value = quill.root.innerHTML;
    });

    const descriptionInput = document.querySelector('#description');
    descriptionInput.value = quill.root.innerHTML;
});