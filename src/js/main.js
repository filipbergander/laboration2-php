// Ser att JS-filen laddats in
console.log("Nu har main.js laddats");

// Hämtar in element
const notification = document.getElementById("notification");
const cancelBtn = document.getElementById("cancel-btn");
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("add-item-modal");
const closeModalIcon = document.getElementById("close-modal");

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

// Döljer notifikationen efter 3 sekunder, detta när man lagt till en ny sak i bucketlisten
if (notification) {
    setTimeout(() => {
        notification.remove();
    }, 3000);
}