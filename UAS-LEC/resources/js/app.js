import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Manage User
$(document).ready(function () {
    $("#UserTable table").DataTable();
});

document.querySelectorAll(".openEditModalBtn").forEach((button) => {
    button.addEventListener("click", function () {
        const userId = this.getAttribute("data-id");
        const userName = this.getAttribute("data-name");
        const userEmail = this.getAttribute("data-email");
        const userVerifiedAt = this.getAttribute("data-verified-at");

        const form = document.getElementById("editUserForm");
        form.action = form.action.replace(":id", userId);

        document.getElementById("userId").value = userId;
        document.getElementById("editName").value = userName;
        document.getElementById("editEmail").value = userEmail;

        if (userVerifiedAt) {
            document.getElementById("editVerifiedAt").value = userVerifiedAt;
        } else {
            document.getElementById("editVerifiedAt").value = "";
        }

        document.getElementById("editModal").classList.remove("hidden");
    });
});

document.getElementById("closeModalBtn").addEventListener("click", function () {
    document.getElementById("editModal").classList.add("hidden");
});

// Newsletter
document
    .getElementById("createNewsletterBtn")
    .addEventListener("click", function () {
        document
            .getElementById("createNewsletterModal")
            .classList.remove("hidden");
    });

document.getElementById("closeModalBtn").addEventListener("click", function () {
    document.getElementById("createNewsletterModal").classList.add("hidden");
});

// Add Newsletterx
document.addEventListener("DOMContentLoaded", () => {
    const quill = new Quill("#quill-editor", {
        theme: "snow",
        placeholder: "Tulis Deskripsi di sini...",
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block"],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ align: [] }],
                ["link", "image", "video"],
                ["clean"],
            ],
        },
    });

    quill.on("text-change", function () {
        const descriptionInput = document.querySelector("#description");
        descriptionInput.value = quill.root.innerHTML;
    });

    const descriptionInput = document.querySelector("#description");
    descriptionInput.value = quill.root.innerHTML;
});

// Edit Newsletter
document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById("editNewsletterModal");
    const closeEditModalBtn = document.getElementById("closeEditModalBtn");
    const editNewsletterForm = document.getElementById("editNewsletterForm");

    let quill;
    const openEditModalBtns = document.querySelectorAll(".openEditModalBtn");
    openEditModalBtns.forEach((button) => {
        button.addEventListener("click", function () {
            const newsletterId = this.getAttribute("data-id");
            const title = this.getAttribute("data-title");
            const description = this.getAttribute("data-description");
            const publishDate = this.getAttribute("data-publish_date");
            const image = this.getAttribute("data-image");

            editNewsletterForm.action = editNewsletterForm.action.replace(
                ":id",
                newsletterId
            );
            document.getElementById("editTitle").value = title;
            document.getElementById("editPublishDate").value = publishDate;
            document.getElementById("editImage").src = image;

            if (!quill) {
                quill = new Quill("#quillEditorEdit", {
                    placeholder: "Edit Deskripsi di sini...",
                    modules: {
                        toolbar: [
                            [{ header: [1, 2, 3, false] }],
                            ["bold", "italic", "underline", "strike"],
                            ["blockquote", "code-block"],
                            [{ list: "ordered" }, { list: "bullet" }],
                            [{ align: [] }],
                            ["link", "image", "video"],
                            ["clean"],
                        ],
                    },
                    theme: "snow",
                });
            }

            quill.root.innerHTML = description;
            quill.on("text-change", function () {
                const descriptionInput =
                    document.querySelector("#editDescription");
                descriptionInput.value = quill.root.innerHTML;
            });

            editModal.classList.remove("hidden");
        });
    });

    closeEditModalBtn.addEventListener("click", function () {
        editModal.classList.add("hidden");
    });

    window.addEventListener("click", function (e) {
        if (e.target === editModal) {
            editModal.classList.add("hidden");
        }
    });
});

// Delete Newsletter
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("deleteConfirmationModal");
    const cancelBtn = document.getElementById("cancelDeleteBtn");
    const deleteForm = document.getElementById("deleteNewsletterForm");

    document.querySelectorAll(".openDeleteModalBtn").forEach((button) => {
        button.addEventListener("click", function () {
            const newsletterId = this.dataset.id;
            deleteForm.action = `/dashboard/newsletters/delete/${newsletterId}`;
            modal.style.display = "flex";
            modal.classList.remove("hidden");
        });
    });

    cancelBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
    });
});

// Kalender

