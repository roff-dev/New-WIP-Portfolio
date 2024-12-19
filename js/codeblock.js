/* jshint esversion: 6 */
document.addEventListener('DOMContentLoaded', () => {
    // Select all snippet dropdown toggles
    const snippetToggles = document.querySelectorAll('.snippet-dropdown a');

    snippetToggles.forEach(toggle => {
        toggle.addEventListener('click', (event) => {
            // Prevent the default link behavior
            event.preventDefault();

            // Find the parent code snippet block
            const codeSnippet = toggle.closest('.code-snippet');
            if (codeSnippet) {
                const codeBlock = codeSnippet.querySelector('.code-block');
                if (codeBlock) {
                    if (codeBlock.classList.contains('hidden')) {
                        // First make the element visible but keep height at 0
                        codeBlock.style.visibility = 'visible';
                        
                        // Force a reflow to ensure proper animation
                        codeBlock.offsetHeight;
                        
                        // Remove hidden class to trigger animation
                        codeBlock.classList.remove('hidden');
                    } else {
                        // Add hidden class for closing animation
                        codeBlock.classList.add('hidden');
                    }
                    
                    // Toggle the arrow icon direction
                    const arrowIcon = toggle.querySelector('.icon-keyboard_arrow_down');
                    if (arrowIcon) {
                        arrowIcon.classList.toggle('rotated');
                    }
                }
            }
        });
    });
});
