// Aktivitas Terakhir
// Add Aktivitas
const postAktivitasModal = document.getElementById('postAktivitasModal');
const openPostAktivitasModalBtn = document.getElementById('openModalBtn');
const closePostAktivitasModalBtn = document.getElementById('closeModalBtn');

openPostAktivitasModalBtn.addEventListener('click', function() {
    postAktivitasModal.classList.remove('hidden');
});

closePostAktivitasModalBtn.addEventListener('click', function() {
    postAktivitasModal.classList.add('hidden');
});

document.addEventListener('DOMContentLoaded', function() {
    const quillEditor = new Quill('#quill-editor-aktivitas', {
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

    quillEditor.on('text-change', function() {
        const deskripsiInput = document.querySelector('#deskripsi');
        deskripsiInput.value = quillEditor.root.innerHTML;
    });

    const deskripsiInput = document.querySelector('#deskripsi');
    deskripsiInput.value = quillEditor.root.innerHTML;
});

// Edit Aktivitas
const editQuillEditor = new Quill('#edit-quill-editor-aktivitas', {
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

editQuillEditor.on('text-change', function() {
    const deskripsiInput = document.querySelector('#edit_deskripsi');
    deskripsiInput.value = editQuillEditor.root.innerHTML; 
});

    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('postAktivitasModal').classList.remove('hidden');
    });
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('postAktivitasModal').classList.add('hidden');
    });

    document.getElementById('closeEditModalBtn').addEventListener('click', function() {
        document.getElementById('editAktivitasModal').classList.add('hidden');
    });

    document.querySelectorAll('.editAktivitasBtn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');  
        const judul = this.getAttribute('data-judul');
        const kategori = this.getAttribute('data-kategori');
        const tanggal = this.getAttribute('data-tanggal');
        const deskripsi = this.getAttribute('data-deskripsi');

        document.getElementById('edit_judul').value = judul;
        document.getElementById('edit_kategori').value = kategori;
        document.getElementById('edit_tanggal').value = tanggal;

        editQuillEditor.root.innerHTML = deskripsi; 
        const deskripsiInput = document.querySelector('#edit_deskripsi');
        deskripsiInput.value = deskripsi;

        const form = document.getElementById('editAktivitasForm');
        form.action = form.action.replace(':id', id);
        document.getElementById('editAktivitasModal').classList.remove('hidden');
    });
});


// Delete Aktivitas
    document.querySelectorAll('#deleteBtn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const actionUrl = document.getElementById('deleteAktivitasForm').action.replace(':id', id);
            document.getElementById('deleteAktivitasForm').action = actionUrl;

            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
        });
    });

    document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
        document.getElementById('deleteConfirmationModal').classList.add('hidden');
    });


document.addEventListener('DOMContentLoaded', function() {
    const deleteBtns = document.querySelectorAll('[id^="deleteBtn"]'); 
    const deleteModal = document.getElementById('deleteConfirmationModal');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const deleteForm = document.getElementById('deleteAktivitasForm');

    deleteBtns.forEach(function(deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id'); 
            const actionUrl = deleteForm.action.replace(':id', itemId); 

            deleteForm.action = actionUrl;
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDeleteBtn.addEventListener('click', function () {
        deleteModal.classList.add('hidden');
    });
});

// Show Aktivitas
document.addEventListener("DOMContentLoaded", function() {
    const viewAktivitasBtns = document.querySelectorAll('.viewAktivitasBtn');

    viewAktivitasBtns.forEach(button => {
        button.addEventListener('click', function() {
            const id = button.getAttribute('data-id');
            const judul = button.getAttribute('data-judul');
            const kategori = button.getAttribute('data-kategori');
            const tanggal = button.getAttribute('data-tanggal');
            const deskripsi = button.getAttribute('data-deskripsi');
            const gambar = button.getAttribute('data-gambar');
            
            document.getElementById('view_judul').textContent = judul;
            document.getElementById('view_kategori').textContent = kategori;
            document.getElementById('view_tanggal').textContent = tanggal;
            const sanitizedDeskripsi = DOMPurify.sanitize(deskripsi);
            document.getElementById('view_deskripsi').innerHTML = sanitizedDeskripsi;
            document.getElementById('view_gambar').src = gambar ;
            
            const modal = document.getElementById('viewAktivitasModal');
            modal.classList.remove('hidden');
        });
    });

    document.getElementById('closeViewModalBtn').addEventListener('click', function() {
        const modal = document.getElementById('viewAktivitasModal');
        modal.classList.add('hidden');
    });
});

