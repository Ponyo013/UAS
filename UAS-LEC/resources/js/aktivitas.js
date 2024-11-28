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

// Delete Aktivitas
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