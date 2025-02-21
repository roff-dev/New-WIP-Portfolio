document.addEventListener('DOMContentLoaded', () => {
    const filterButton = document.querySelector('.filter-button');
    const filterDropdown = document.querySelector('.filter-dropdown');
    const tagCount = document.querySelector('.tag-count');
    const searchInput = document.querySelector('.snippet-search input');
    const checkboxes = document.querySelectorAll('.tag-option input');
    const snippets = document.querySelectorAll('.code-snippet');
    
    // Toggle dropdown
    filterButton.addEventListener('click', (e) => {
        e.stopPropagation();
        filterDropdown.classList.toggle('active');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!filterButton.contains(e.target) && !filterDropdown.contains(e.target)) {
            filterDropdown.classList.remove('active');
        }
    });
    
    // Handle tag selection
    let selectedTags = new Set();
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                selectedTags.add(checkbox.value);
            } else {
                selectedTags.delete(checkbox.value);
            }
            
            tagCount.textContent = selectedTags.size;
            tagCount.style.display = selectedTags.size ? 'block' : 'none';
            
            filterSnippets();
        });
    });
    
    // Debounce search input
    let searchTimeout;
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            filterSnippets();
        }, 300);
    });
    
    function filterSnippets() {
        const searchQuery = searchInput.value.toLowerCase();
        
        snippets.forEach(snippet => {
            const title = snippet.querySelector('h3').textContent.toLowerCase();
            const code = snippet.querySelector('code').textContent.toLowerCase();
            const tags = Array.from(snippet.querySelectorAll('.language-tag')).map(tag => tag.classList[1]);
            
            const matchesSearch = searchQuery === '' || 
                                title.includes(searchQuery) || 
                                code.includes(searchQuery);
                                
            const matchesTags = selectedTags.size === 0 || 
                              tags.some(tag => selectedTags.has(tag));
            
            snippet.style.display = (matchesSearch && matchesTags) ? 'block' : 'none';
        });
    }
});