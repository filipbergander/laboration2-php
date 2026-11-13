"use strict";

// Overlay och öppna overlay-knappens element
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("add-item-modal");
// Öppnar formuläret vid klick på knappen "Lägg till ny sak"
if (modal && openModalBtn) {
    openModalBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });
}

// Funktion för att dölja overlay för formulär
function hideModal() {
    if (modal) {
        modal.classList.add("hidden");
    }

    if (document.getElementById("bucketlist-edit-form")) {
        window.location.href = window.location.pathname;
    }
}

// Knappar inom lägga till formuläret
const cancelBtn = document.getElementById("cancel-btn");
const closeModalIcon = document.getElementById("close-modal");

// Döljer overlayen vid klick på "Stäng formulär" eller "X"-ikonen i lägg till-formuläret
if (cancelBtn) cancelBtn.addEventListener("click", hideModal);
if (closeModalIcon) closeModalIcon.addEventListener("click", hideModal);


// Knappar inom redigeringsformuläret
const editCancelBtn = document.getElementById("edit-cancel-btn");
const editCloseModalIcon = document.getElementById("edit-close-modal")

// Döljer overlay för redigeringsformulär
if (editCancelBtn) editCancelBtn.addEventListener("click", hideModal);
if (editCloseModalIcon) editCloseModalIcon.addEventListener("click", hideModal);

// Tar bort eventuella felmeddelanden och nollställer inputs när man klickar på "Återställ formulär"
const resetBtn = document.getElementById("reset-btn");
if (resetBtn) {
    resetBtn.addEventListener("click", () => {
        // Hämtar in element
        const errorMsgContainer = document.getElementById("error-messages");
        const prioritySelect = document.getElementById("priority");
        const nameInput = document.getElementById("name");
        const descriptionInput = document.getElementById("description");
        // Nollställer inputs och felmeddelanden
        if (errorMsgContainer) errorMsgContainer.innerHTML = "";
        if (descriptionInput) {
            descriptionInput.value = "";
            descriptionInput.defaultValue = "";
        }
        if (nameInput) {
            nameInput.value = "";
            nameInput.defaultValue = "";
        }
        if (prioritySelect) {
            prioritySelect.value = "1";
            prioritySelect.selectedIndex = 0;
        }
    });
}


// Döljer notifikationen efter 3 sekunder, detta när man lagt till en ny sak i bucketlisten
const notification = document.getElementById("notification");
if (notification) {
    setTimeout(() => {
        notification.remove();
    }, 3000);
}