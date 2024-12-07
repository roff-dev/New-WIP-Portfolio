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

//typing animation
var typed = new Typed("#typed", {
    strings: [
        `C:/<span class="highlight-name">Kieron Oates</span> <span class="npm">npm</span> install <span class="highlight-skill">Web Developer</span> <span class="gray-skills">--skills</span>`
    ],
    typeSpeed: 50,
    startDelay: 500,
    backDelay: 2500,
    backSpeed: 35,
    loop: true,
});