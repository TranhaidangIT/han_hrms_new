// onload event
window.addEventListener("load", function () {
    // sự kiện load form vào modal chỉnh sửa
    const editButtons = document.querySelectorAll(".js-open-modal[data-url]");
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const idValue = this.parentElement.getAttribute("data-id");
            const url = this.getAttribute("data-url").replace(/:id/g, idValue);
            const targetModal = this.getAttribute("data-bs-target");
            const modal = document.querySelector(targetModal);
            const modalBody = modal.querySelector(".modal-body");
            modalBody.innerHTML =
                '<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>';
            fetch(url)
                .then((response) => response.text())
                .then((html) => {
                    modalBody.innerHTML = html;
                })
                .catch((error) => {
                    console.error("Error loading form:", error);
                })
                .finally(() => {
                    //
                });
        });
    });

    // thay đổi action của form xóa khi vừa tải trang
    const deleteButtons = document.querySelectorAll(".js-btn-del");
    deleteButtons.forEach((button) => {
        const idValue = button.closest("td").getAttribute("data-id");
        const form = button.closest("form");
        const url = form.getAttribute('action').replace(/:id/g, idValue);
        form.setAttribute("action", url);
    });
    
    // thay đổi url của nút sửa khi vừa tải trang
    const editBtn = document.querySelectorAll(".js-btn-edit");
    editBtn.forEach((button) => {
        const idValue = button.closest("td").getAttribute("data-id");
        const a = button.closest("a");
        const url = a.getAttribute('href').replace(/:id/g, idValue);
        a.setAttribute("href", url);
    });
});

