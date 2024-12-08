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

// Remove location on mouse hover
document.querySelectorAll('.no-status-url').forEach(element => {
    element.addEventListener('click', function() {
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
});

//flip function
$(document).ready(function() {
    $('.card').flip({
        trigger: 'manual' ,
        speed: 700, 
        easing: 'ease-in-out',
    });

    $('.card').on('click', function(event) {
        
        if (!$(this).data('flipped')) {
            $(this).flip(true); 
            $(this).data('flipped', true);
        } else {
            $(this).flip(false); 
            $(this).data('flipped', false); 
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');
    const emailInput = document.getElementById('email');
    const firstNameInput = document.getElementById('first-name');
    const lastNameInput = document.getElementById('last-name');
    const messageInput = document.getElementById('message');

    // email regex
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    

    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        // clear error messages
        clearErrorMessages();

        // Check all fields
        if (firstNameInput.value.trim() === "") {
            showError(firstNameInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        if (lastNameInput.value.trim() === "") {
            showError(lastNameInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        if (emailInput.value.trim() === "") {
            showError(emailInput, "Field required, Do not leave blank.");
            isValid = false;
        } else if (!emailPattern.test(emailInput.value)) {
            showError(emailInput, "Please enter a valid email.");
            isValid = false;
        }

        if (messageInput.value.trim() === "") {
            showError(messageInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        // prevent if invalid
        if (!isValid) {
            event.preventDefault();
        } else {
            alert("Contact Form Sent! Response will arrive shortly.");
        }
    });
});