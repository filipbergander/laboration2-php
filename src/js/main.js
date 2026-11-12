console.log("Nu har main.js laddats");
const notification = document.getElementById("notification");

if (notification) {
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function displayNotification(message, type) {
    notification.textContent = message;
    notification.className = `notification ${type}`;
    notification.style.display = "block";
}