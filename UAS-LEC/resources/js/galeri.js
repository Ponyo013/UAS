// Add Newsletter
document.getElementById('createGaleriBtn').addEventListener('click', function() {
    document.getElementById('createGaleriModal').classList.remove('hidden');
});

document.getElementById('closeModalBtn').addEventListener('click', function () {
    document.getElementById('createGaleriModal').classList.add('hidden');
});


// Delete Newsletter
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('deleteConfirmationModal');
    const cancelBtn = document.getElementById('cancelDeleteBtn');
    const deleteForm = document.getElementById('deleteNewsletterForm');
    
    document.querySelectorAll('.openDeleteModalBtn').forEach(button => {
        button.addEventListener('click', function () {
            const newsletterId = this.dataset.id;
            deleteForm.action = `/dashboard/newsletters/delete/${newsletterId}`;
            modal.style.display = 'flex';
            modal.classList.remove('hidden'); 
        });
    });

    cancelBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
    });
});