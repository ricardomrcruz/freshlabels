let popup = document.getElementById("popup");

function openPopup(id) {
    let popup = document.getElementById("popup-" + id);
    popup.classList.add("open-popup");
}

function closePopup(id) {
    let popup = document.getElementById("popup-" + id);
    popup.classList.remove("open-popup");
}

