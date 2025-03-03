document.addEventListener('DOMContentLoaded', () => {
    const filterButton = document.querySelector('.filter-button');
    const filterDropdown = document.querySelector('.filter-dropdown');
    const tagCount = document.querySelector('.tag-count');
    const searchInput = document.querySelector('.snippet-search input');
    const checkboxes = document.querySelectorAll('.tag-option input');
    const snippetsContainer = document.querySelector('.snippets-list');
    
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
            
            fetchFilteredSnippets(1);
        });
    });
    
    // Debounce search input
    let searchTimeout;
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            fetchFilteredSnippets(1);
        }, 300);
    });

    // Function to fetch filtered snippets
    async function fetchFilteredSnippets(page = 1) {
        try {
            const searchQuery = searchInput.value;
            const selectedLanguages = Array.from(selectedTags);
            
            // Build query string
            const params = new URLSearchParams({
                page: page,
                search: searchQuery
            });
            
            // Add selected languages
            selectedLanguages.forEach(lang => {
                params.append('language[]', lang);
            });

            const response = await fetch(`inc/get_filtered_snippets.php?${params.toString()}`);
            const data = await response.json();

            if (data.success) {
                updateSnippets(data.data.snippets);
                updatePagination(data.data.pagination);
            } else {
                console.error('Error fetching snippets:', data.error);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }

    // Function to update snippets in the DOM
    function updateSnippets(snippets) {
        // Clear existing snippets except search and filter elements
        const searchAndFilter = snippetsContainer.querySelector('.snippet-search');
        snippetsContainer.innerHTML = '';
        snippetsContainer.appendChild(searchAndFilter);

        snippets.forEach(snippet => {
            const snippetHTML = `
                <div class="code-snippet">
                    <div class="snippet-header">
                        <div class="snippet-title">
                            <div class="snippet-left">
                                <a href="index.php#portfolio"><img src="${escapeHtml(snippet.source)}" alt="project image"></a>
                                <h3>${escapeHtml(snippet.title)}</h3>
                            </div>
                            <div class="snippet-tags">
                                <span class="language-tag ${escapeHtml(snippet.language)}">
                                    ${escapeHtml(snippet.language.toUpperCase())}
                                </span>
                            </div>
                        </div>
                        <div class="snippet-dropdown">
                            <a href="#"><span class="icon-keyboard_arrow_down"></span></a>
                        </div>
                    </div>
                    <pre class="code-block hidden">
                        <code class="language-${escapeHtml(snippet.language)}">
                            ${escapeHtml(snippet.code)}
                        </code>
                    </pre>
                </div>
            `;
            snippetsContainer.insertAdjacentHTML('beforeend', snippetHTML);
        });

        // Reinitialize Prism.js for syntax highlighting
        if (window.Prism) {
            Prism.highlightAll();
        }

        // Reattach click handlers for dropdowns
        attachDropdownHandlers();
    }

    // Function to update pagination
    function updatePagination(pagination) {
        let paginationHTML = '';
        
        if (pagination.total_pages > 1) {
            paginationHTML = '<div class="pagination">';
            
            // Previous page link
            if (pagination.current_page > 1) {
                paginationHTML += `<a href="#" data-page="${pagination.current_page - 1}">&laquo; Previous</a> `;
            }
            
            // Page numbers
            for (let i = 1; i <= pagination.total_pages; i++) {
                if (i === pagination.current_page) {
                    paginationHTML += `<span class="current">${i}</span> `;
                } else {
                    paginationHTML += `<a href="#" data-page="${i}">${i}</a> `;
                }
            }
            
            // Next page link
            if (pagination.current_page < pagination.total_pages) {
                paginationHTML += `<a href="#" data-page="${pagination.current_page + 1}">Next &raquo;</a>`;
            }
            
            paginationHTML += '</div>';
        }

        // Remove existing pagination
        const existingPagination = snippetsContainer.querySelector('.pagination');
        if (existingPagination) {
            existingPagination.remove();
        }

        // Add new pagination
        snippetsContainer.insertAdjacentHTML('beforeend', paginationHTML);

        // Add click handlers for pagination links
        const paginationLinks = snippetsContainer.querySelectorAll('.pagination a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const page = parseInt(link.dataset.page);
                fetchFilteredSnippets(page);
                window.scrollTo(0, 0);
            });
        });
    }

    // Helper function to escape HTML
    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // Function to attach dropdown handlers
    function attachDropdownHandlers() {
        // Use the global initialize function from codeblock.js
        if (window.initializeSnippetToggles) {
            window.initializeSnippetToggles();
        }
    }

    // Initial attachment of dropdown handlers
    attachDropdownHandlers();

    // Load initial snippets
    fetchFilteredSnippets(1);
});