/* 
////////////////////////////////////////// FORM VALIDATION/////////////////////////////////////////////////
*/
/* jshint esversion: 6 */

// Global function to remove alerts
function removeAlert(event) {
    const button = event.target;
    const alertDiv = button.closest('.alert');
    if (alertDiv) {
        alertDiv.style.display = 'none';
        alertDiv.innerHTML = ''; // Clear the content
    }
}

// Function to clear all PHP and JS alerts
function clearAllAlerts() {
    // Clear PHP alert boxes
    const alertDivs = document.querySelectorAll('.alert-error, .alert-success');
    alertDivs.forEach(div => {
        div.style.display = 'none';
        div.innerHTML = '';
    });
    
    // Clear JS validation styles
    const errorInputs = document.querySelectorAll('.error');
    errorInputs.forEach(input => input.classList.remove('error'));
}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('form');
    // Check if form exists before proceeding
    if (!form) {
        console.error("Form element not found!");
        return; // Exit if form is not found
    }
    const alertDiv = document.querySelector('.alert-error');
    const successDiv = document.querySelector('.alert-success');

    // Function to show error by highlighting field in red
    function showError(input) {
        input.style.borderColor = '#ff0000';
        input.style.boxShadow = '0 0 5px rgba(255, 0, 0, 0.3)';
    }

    // Function to reset field styling
    function resetFieldStyle(input) {
        input.style.borderColor = '';
        input.style.boxShadow = '';
    }

    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const subjectInput = document.getElementById('subject'); 
    const messageInput = document.getElementById('message');
    
    function validateForm() {
        let isValid = true;
        
        // Clear all alerts before validation
        clearAllAlerts();

        // Reset all field styles
        [nameInput, emailInput, subjectInput, messageInput].forEach(resetFieldStyle);

        // Check all fields if blank
        if (nameInput.value.trim() === "") {
            showError(nameInput);
            isValid = false;
        }

        if (emailInput.value.trim() === "") {
            showError(emailInput);
            isValid = false;
        } 

        if (subjectInput.value.trim() === "") {
            showError(subjectInput);
            isValid = false;
        }

        if (messageInput.value.trim() === "") {
            showError(messageInput);
            isValid = false;
        }

        // If any field is invalid, show the error message in the alert box
        if (!isValid && alertDiv) {
            alertDiv.style.display = 'block';
            alertDiv.innerHTML = 'Please fill in all required fields.';
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
                clearAllAlerts(); // Clear any existing alerts before showing new ones
                
                if (data.success) {
                    this.reset();
                    if (successDiv) {
                        successDiv.style.display = 'block';
                        successDiv.innerHTML = 'Your message has been sent!';
                        // Hide success message after 3 seconds
                        setTimeout(() => {
                            successDiv.style.display = 'none';
                            successDiv.innerHTML = '';
                        }, 7000);
                    }
                } else {
                    if (alertDiv) {
                        alertDiv.style.display = 'block';
                        alertDiv.innerHTML = `${data.error} <button onclick="removeAlert(event)">x</button>`;
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                clearAllAlerts();
                if (alertDiv) {
                    alertDiv.style.display = 'block';
                    alertDiv.innerHTML = 'An error occurred. Please try again later.';
                }
            });
        }
    });
});