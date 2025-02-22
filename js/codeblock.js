/* jshint esversion: 6 */
document.addEventListener('DOMContentLoaded', () => {
    // Select all snippet dropdown toggles
    const snippetToggles = document.querySelectorAll('.snippet-dropdown a');

    let previousScrollPosition = 0; // Store previous scroll position

    snippetToggles.forEach(toggle => {
        toggle.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            // Find the parent code snippet block
            const codeSnippet = toggle.closest('.code-snippet');
            if (codeSnippet) {
                const codeBlock = codeSnippet.querySelector('.code-block');
                if (codeBlock) {
                    if (codeBlock.classList.contains('hidden')) {
                        // Save the current scroll position
                        previousScrollPosition = window.scrollY;

                        // Make element visible first
                        codeBlock.style.visibility = 'visible';

                        // Force reflow before removing 'hidden'
                        codeBlock.offsetHeight;

                        // Remove hidden class to show snippet
                        codeBlock.classList.remove('hidden');

                        // Wait for transition to finish before scrolling
                        setTimeout(() => {
                            const rect = toggle.getBoundingClientRect();
                            const scrollTo = window.scrollY + rect.top - 20; // 20px padding
                            window.scrollTo({ top: scrollTo, behavior: 'smooth' });
                        }, 300); // Adjust this timeout to match CSS transition time
                        
                    } else {
                        // Hide the snippet
                        codeBlock.classList.add('hidden');

                        // Wait for closing animation to complete before scrolling back
                        setTimeout(() => {
                            window.scrollTo({ top: previousScrollPosition, behavior: 'smooth' });
                        }, 300);
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
