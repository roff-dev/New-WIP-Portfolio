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
                    // Toggle visibility by adding/removing a class
                    codeBlock.classList.toggle('hidden');
                    
                    // Optionally, toggle the arrow icon direction
                    const arrowIcon = toggle.querySelector('.icon-keyboard_arrow_down');
                    if (arrowIcon) {
                        arrowIcon.classList.toggle('rotated');
                    }
                }
            }
        });
    });
});