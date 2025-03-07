// Get the theme toggle button and icon
const themeToggle = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');

// Check for saved theme preference, otherwise use default theme
const savedTheme = localStorage.getItem('theme') || 'dark';
document.documentElement.setAttribute('data-theme', savedTheme);
updateIcon(savedTheme);

// Add click event listener to theme toggle button
themeToggle.addEventListener('click', () => {
    // Get the current theme
    const currentTheme = document.documentElement.getAttribute('data-theme');
    // Switch to the opposite theme
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    // Update the theme
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    
    // Update the icon
    updateIcon(newTheme);
});

// Function to update the icon based on the current theme
function updateIcon(theme) {
    if (theme === 'dark') {
        themeIcon.className = 'fas fa-sun';  // Show sun icon in dark mode
    } else {
        themeIcon.className = 'fas fa-moon'; // Show moon icon in light mode
    }
}
