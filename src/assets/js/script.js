document.addEventListener('DOMContentLoaded', (event) => {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function() {
        const currentScroll = window.scrollY || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scrolling down
            navbar.classList.add('hidden');
        } else {
            // Scrolling up
            navbar.classList.remove('hidden');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    }, false);
});


let currentIndex = 0;

function moveRight() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    const itemWidth = items[0].offsetWidth + parseFloat(window.getComputedStyle(items[0]).marginLeft) + parseFloat(window.getComputedStyle(items[0]).marginRight); // Include both margins
    currentIndex = (currentIndex + 2) % totalItems; // Move two items
    carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}

function moveLeft() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    const itemWidth = items[0].offsetWidth + parseFloat(window.getComputedStyle(items[0]).marginLeft) + parseFloat(window.getComputedStyle(items[0]).marginRight); // Include both margins
    currentIndex = (currentIndex - 2 + totalItems) % totalItems; // Move two items
    carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}



// Initialisation de la carte
var map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées de Paris

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Récupération des localisations depuis le DOM
var locations = document.querySelectorAll('#location-list li');
locations.forEach(location => {
    var lat = location.getAttribute('data-lat');
    var lng = location.getAttribute('data-lng');
    var name = location.getAttribute('data-name');
    var adr = location.getAttribute('data-adr');
    var gmaps = location.getAttribute('data-gmaps');

    // Création de chaque marqueur sur la carte avec un popup différent
    var marker = L.marker([lat, lng]).addTo(map)
        .bindPopup('<strong>' + name + '</strong><br>' + adr + '<br><a href="' + gmaps + '" target="_blank">Voir sur Google Maps</a>');

    // Ajout d'un événement de clic pour centrer la carte et ouvrir le popup
    location.addEventListener('click', () => {
        map.setView([lat, lng], 15);
        marker.openPopup();
    });
});




