/* jshint esversion: 6 */
document.addEventListener('DOMContentLoaded', () => {
    // Select all snippet dropdown toggles
    const snippetToggles = document.querySelectorAll('.snippet-dropdown a');
    
    let previousScrollPosition = 0; // Store previous scroll position

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
                        // Save the current scroll position before opening the snippet
                        previousScrollPosition = window.scrollY;

                        // Make the code block visible but start with height 0
                        codeBlock.style.visibility = 'visible';
                        
                        // Force reflow so the browser acknowledges the change
                        codeBlock.offsetHeight;

                        // Remove the hidden class to allow the animation
                        codeBlock.classList.remove('hidden');

                        // Now wait until the snippet is fully open before scrolling
                        setTimeout(() => {
                            // Get the position of the toggle button
                            const rect = toggle.getBoundingClientRect();
                            const scrollTo = window.scrollY + rect.top - 20; // A little padding for the top

                            // Scroll to the calculated position
                            window.scrollTo({ top: scrollTo, behavior: 'smooth' });
                        }, 300); // Adjust timeout for the snippet to open completely
                    } else {
                        // Close the snippet (add hidden class again)
                        codeBlock.classList.add('hidden');

                        // Scroll back to the previous position
                        window.scrollTo({ top: previousScrollPosition, behavior: 'smooth' });
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
