$(document).ready(function() {
    $('#itemTable table').DataTable(); 
});

// Delete
const deleteModal = document.getElementById('deleteModal');
const openDeleteModalBtns = document.querySelectorAll('.openDeleteModalBtn');
const closeDeleteModalBtn = document.getElementById('closeDeleteModalBtn');
const deleteUserForm = document.getElementById('deleteUserForm');

openDeleteModalBtns.forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id'); 
        const deleteUrl = deleteUserForm.getAttribute('action').replace(':id', userId); // Replace :id with donor ID
        deleteUserForm.action = deleteUrl;  
        
        deleteModal.classList.remove('hidden');  
    });
});

closeDeleteModalBtn.addEventListener('click', function () {
    deleteModal.classList.add('hidden');  
});

// zoom In
const thumbnails = document.querySelectorAll('.thumbnail'); 
const modal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');
const modalImage = document.getElementById('modalImage');

thumbnails.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function() {
        modal.classList.remove('hidden');
        modalImage.src = thumbnail.src; 
    });
});

closeModal.addEventListener('click', function() {
    modal.classList.add('hidden'); 
});

modal.addEventListener('click', function(e) {
    if (e.target === modal) {
        modal.classList.add('hidden'); 
    }
});

// edit
document.querySelector('form').addEventListener('submit', function(event) {
    let jumlahDonasiInput = document.getElementById('jumlah_donasi');
    jumlahDonasiInput.value = jumlahDonasiInput.value.replace(/[^\d]/g, ''); 
});

const editModal = document.getElementById('editModal');
const closeEditModalBtn = document.getElementById('closeEditModalBtn');
const editDonasiForm = document.getElementById('editDonasiForm');

const openEditModalBtns = document.querySelectorAll('.openEditModalBtn');
openEditModalBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const donasiId = this.closest('tr').querySelector('.openDeleteModalBtn').getAttribute('data-id');
        const row = this.closest('tr');
        const namaDonatur = row.querySelector('td:nth-child(2)').innerText;
        const jumlahDonasi = row.querySelector('td:nth-child(3)').innerText.replace('Rp. ', '').replace('.', ''); // Remove 'Rp' and dots
        const deskripsi = row.querySelector('td:nth-child(4)').innerText;
        const statusText = row.querySelector('td:nth-child(6)').innerText.trim();

        const statusMapping = {
            'Belum Valid': 'belum_valid',
            'Tidak Valid': 'tidak_valid',
            'Valid': 'valid'
        };
        const statusValue = statusMapping[statusText];

        editModal.classList.remove('hidden');
        editDonasiForm.action = editDonasiForm.action.replace(':id', donasiId);
        document.getElementById('editNamaDonatur').value = namaDonatur;
        document.getElementById('editJumlahDonasi').value = formatRupiah(jumlahDonasi); 
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editStatus').value = statusValue;

        updateCharCount();
    });
});

closeEditModalBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
});

const editJumlahDonasiInput = document.getElementById('editJumlahDonasi');
editJumlahDonasiInput.addEventListener('input', function() {
    this.value = formatRupiah(this.value); 
});

// Word count
const editDeskripsiTextarea = document.getElementById('editDeskripsi');
const editCharCountDisplay = document.getElementById('editCharCount');
const maxEditChars = 50; 
function updateEditCharCount() {
    const charCount = editDeskripsiTextarea.value.length; 
    editCharCountDisplay.textContent = `Jumlah karakter: ${charCount}/${maxEditChars}`;

    if (charCount > maxEditChars) {
        editDeskripsiTextarea.value = editDeskripsiTextarea.value.substring(0, maxEditChars);
        editCharCountDisplay.textContent = `Jumlah karakter: ${maxEditChars}/${maxEditChars}`; // Update ke batas maksimal
    }
}
editDeskripsiTextarea.addEventListener('input', updateEditCharCount);

function updateCharCount() {
    const deskripsiTextarea = document.getElementById('editDeskripsi');
    const charCountDisplay = document.getElementById('editCharCount');
    const maxChars = 50; 

    const charCount = deskripsiTextarea.value.length;
    charCountDisplay.textContent = `Jumlah karakter: ${charCount}/${maxChars}`;
}
document.getElementById('editDeskripsi').addEventListener('input', updateCharCount);
