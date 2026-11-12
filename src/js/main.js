// Ser att JS-filen laddats in
console.log("Nu har main.js laddats");

// Hämtar in element
const notification = document.getElementById("notification");
const cancelBtn = document.getElementById("cancel-btn");
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("add-item-modal");
const closeModalIcon = document.getElementById("close-modal");
const resetBtn = document.getElementById("reset-btn");
const errorMsgContainer = document.getElementById("error-messages");
const prioritySelect = document.getElementById("priority");
const nameInput = document.getElementById("name");
const descriptionInput = document.getElementById("description");

// Öppnar formuläret vid klick på knappen "Lägg till ny sak"
openModalBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Döljer overlayen vid klick på "Stäng formulär" eller "X"-ikonen i formuläret
cancelBtn.addEventListener("click", hideModal);
closeModalIcon.addEventListener("click", () => {
    console.log("Stäng formulär-ikonen klickad");
    hideModal();
});

// Funktion för att dölja overlay för formulär
function hideModal() {
    modal.classList.add("hidden");
}

// Tar bort eventuella felmeddelanden och nollställer inputs när man klickar på "Återställ formulär"
resetBtn.addEventListener("click", (e) => {
    e.preventDefault();
    errorMsgContainer.innerHTML = "";
    descriptionInput.value = "";
    nameInput.value = "";
    nameInput.defaultValue = "";
    descriptionInput.defaultValue = "";
    // Sätter prioriteten till 1
    prioritySelect.value = "1";
    prioritySelect.selectedIndex = 0;
});

// Döljer notifikationen efter 3 sekunder, detta när man lagt till en ny sak i bucketlisten
if (notification) {
    setTimeout(() => {
        notification.remove();
    }, 3000);
}