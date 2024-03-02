// JavaScript for mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const menu = document.querySelector('.menu');

    // Add click event listener to mobile menu toggle button
    mobileMenuToggle.addEventListener('click', function() {
        menu.classList.toggle('open'); // Toggle the 'open' class on the menu
    });
});
