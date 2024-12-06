const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const navSocial = document.getElementById('socials');

// Toggle the menu
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active'); 
    navSocial.classList.toggle('active'); 
});

// Close the menu when clicking outside
document.addEventListener('click', (event) => {
    if (!hamburger.contains(event.target) && !navLinks.contains(event.target)) {
        navLinks.classList.remove('active');
        navSocial.classList.remove('active'); 
    }
});