/* 
////////////////////////////////////////// FORM VALIDATION/////////////////////////////////////////////////
*/
/* jshint esversion: 6 */

// Global function to remove alerts
// function removeAlert(event) {
//     const button = event.target;
//     const alertDiv = button.closest('.alert');
//     if (alertDiv) {
//         alertDiv.style.display = 'none';
//         alertDiv.innerHTML = ''; // Clear the content
//     }
// }

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('form');
    // Check if form exists before proceeding
    if (!form) {
        console.error("Form element not found!");
        return; // Exit if form is not found
    }
    const alertDiv = document.querySelector('.alert-error');
    // Function to show error message
    function showError(input, message) {
        const formControl = input.parentElement;
        const errorDiv = formControl.querySelector('.error-message') || document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        
        if (!formControl.querySelector('.error-message')) {
            formControl.appendChild(errorDiv);
        }
        
        input.classList.add('error');
    }

    // Function to clear all error messages
    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll('.error-message');
        const errorInputs = document.querySelectorAll('.error');
        
        errorMessages.forEach(error => error.remove());
        errorInputs.forEach(input => input.classList.remove('error'));
    }

    const firstNameInput = document.getElementById('firstname');
    const lastNameInput = document.getElementById('lastname');
    const emailInput = document.getElementById('email');
    const subjectInput = document.getElementById('subject'); 
    const messageInput = document.getElementById('message');

    // email regex
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    function validateForm() {
        let isValid = true;
        
        // clear error messages
        clearErrorMessages();

        // Check all fields if blank
        if (firstNameInput.value.trim() === "") {
            showError(firstNameInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        if (lastNameInput.value.trim() === "") {
            showError(lastNameInput, "Field required, Do not leave blank.");
            isValid = false;
        } 

        // Validate phone number using regex
        if (emailInput.value.trim() === "") {
            showError(emailInput, "Field required, Do not leave blank.");
            isValid = false;
        } 

        if (subjectInput.value.trim() === "") {
            showError(subjectInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        if (messageInput.value.trim() === "") {
            showError(messageInput, "Field required, Do not leave blank.");
            isValid = false;
        }

        return isValid;
    }

    document.getElementById('form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            const formData = new FormData(this);
            
            fetch('inc/process_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                
                if (data.success) {
                    this.reset();
                    if (alertDiv) {
                        alertDiv.style.display = 'block';
                        alertDiv.insertAdjacentHTML('beforeend', 'Your message has been sent!');
                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            const successMessages = alertDiv.querySelectorAll('.success-message');
                            successMessages.forEach(msg => msg.remove());
                            if (alertDiv.children.length === 0) {
                                alertDiv.style.display = 'none';
                            }
                        }, 5000);
                    }
                } else {
                    if (alertDiv) {
                        alertDiv.style.display = 'block';
                        alertDiv.insertAdjacentHTML('beforeend', `${data.error}`);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const alertDiv = document.querySelector('.alert-error');
                if (alertDiv) {
                    alertDiv.style.display = 'block';
                    alertDiv.insertAdjacentHTML('beforeend', '<div class="error-message">An error occurred. Please try again later.</div>');
                }
            });
        }
    });
});