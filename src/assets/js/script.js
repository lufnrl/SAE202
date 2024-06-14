document.addEventListener('DOMContentLoaded', (event) => {
    let lastScrollTop = 0;
    const navbar = document.querySelector('#main-header');

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


document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const menuItems = document.getElementById('menu-items');

    burgerMenu.addEventListener('click', function () {
        if (menuItems.style.display === 'block') {
            menuItems.style.display = 'none';
        } else {
            menuItems.style.display = 'block';
        }
    });
});


// Show or hide the back to top button based on scroll position
window.onscroll = function() {
    const button = document.getElementById('back-to-top');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

// Smooth scroll to top function
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


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



var map = L.map('map').setView([48.2971626, 4.0746257   ], 13); // Coordonnées de Troyes

var IconMap = L.icon({
    iconUrl: '/src/assets/img/iconeMap.png',
});

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
    var marker = L.marker([lat, lng], {icon: IconMap}).addTo(map)
        .bindPopup('<strong>' + name + '</strong><br>' + adr + '<br><a href="' + gmaps + '" target="_blank">Voir sur Google Maps</a>');

    // Ajout d'un événement de clic pour centrer la carte et ouvrir le popup
    location.addEventListener('click', () => {
        map.setView([lat, lng], 15);
        marker.openPopup();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const navButtons = document.querySelectorAll('.nav-button');
    const sections = document.querySelectorAll('.profile-section');

    console.log('Nav buttons:', navButtons);
    console.log('Sections:', sections);

    // Function to show the section based on the button clicked
    const showSection = (targetId) => {
        console.log('Section affichée:', targetId);
        sections.forEach(section => {
            if (section.id === targetId) {
                section.style.display = 'block';  // Show the selected section
            } else {
                section.style.display = 'none';   // Hide all other sections
            }
        });
    };

    // Attach click event listeners to nav buttons
    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-target');
            console.log('Click:', target);
            showSection(target);  // Call the showSection function with the target section id
        });
    });

    // Show the first section by default
    if (sections.length > 0) {
        console.log('Première section:', sections[0].id);
        showSection(sections[0].id);  // Show the first section initially
    }
});