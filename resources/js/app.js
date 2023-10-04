import './bootstrap';
import 'bootstrap';
import './test';
// Questo serve per far aprire il menù a tendina laterale cliccando da mobile
document.addEventListener("DOMContentLoaded", function () {
    var offcanvasToggle = document.querySelector(".navbar-toggler");
    var offcanvas = new bootstrap.Offcanvas(document.getElementById("navbarOffcanvas"));

    offcanvasToggle.addEventListener("click", function () {
        offcanvas.show();
    });
});

document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
        button.blur(); // Rimuove il focus dal pulsante
    });
});

document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
        button.style.backgroundColor = 'transparent'; // Imposta lo sfondo del pulsante su trasparente
        button.blur(); // Rimuove il focus dal pulsante
    });
});

// Modal logout che compare tenendo premuto
let touchStartTimestamp;

const logoutButton = document.querySelector('.navbar-nav .nav-link[data-bs-target="#logoutModal"]');
const logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));

logoutButton.addEventListener('touchstart', (event) => {
    touchStartTimestamp = Date.now();
});

logoutButton.addEventListener('touchend', (event) => {
    const touchEndTimestamp = Date.now();
    const touchDuration = touchEndTimestamp - touchStartTimestamp;

    if (touchDuration >= 1000) { // Tempo in millisecondi per considerare il tocco prolungato
        logoutModal.show(); // Mostra la modale di logout quando il pulsante è toccato a lungo
    }
});


