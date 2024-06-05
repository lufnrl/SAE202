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
    currentIndex = (currentIndex + 2) % totalItems; // Move two items
    carousel.style.transform = `translateX(-${currentIndex * 50}%)`; // 50% because two items are shown at a time
}

function moveLeft() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    currentIndex = (currentIndex - 2 + totalItems) % totalItems; // Move two items
    carousel.style.transform = `translateX(-${currentIndex * 50}%)`; // 50% because two items are shown at a time
}