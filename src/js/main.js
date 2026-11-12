console.log("Nu har main.js laddats");

const notification = document.getElementById("notification");
const cancelBtn = document.getElementById("cancel-btn");
const modal = document.getElementById("modal");
const openModal = document.getElementById("add-item-modal");

function hideModal() {
    modal.classList.add("hidden");
}

openModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

cancelBtn.addEventListener("click", hideModal);

if (notification) {
    setTimeout(() => {
        notification.remove();
    }, 3000);
}