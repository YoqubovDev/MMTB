/**
 * Districts.js - JavaScript for district views
 * 
 * This file provides functionality for:
 * 1. Search functionality for districts, schools, and kindergartens
 * 2. Table sorting
 * 3. Mobile menu toggle
 * 4. Card animations
 * 5. Error handling
 */

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Initialize search functionality
    initializeSearch();
    
    // Initialize sorting
    initializeSorting();
    
    // Initialize animations
    initializeAnimations();
    
    // Add sort indicators to table headers
    addSortIndicators();
    
    // Initialize flash messages
    initializeFlashMessages();
});

// Search functionality
function initializeSearch() {
    // District search
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.district-card');
            let hasResults = false;

            cards.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                if (name.includes(searchTerm)) {
                    card.style.display = '';
                    hasResults = true;
                } else {
                    card.style.display = 'none';
                }
            });

            const noResults = document.getElementById('noResults');
            if (noResults) {
                noResults.style.display = hasResults ? 'none' : 'block';
            }
        });
    }

    // Schools search
    initializeTableSearch('schoolSearchInput', '.school-row', 'noSchoolResults');
    
    // Kindergartens search
    initializeTableSearch('kindergartenSearchInput', '.kindergarten-row', 'noKindergartenResults');
}

// Table sorting functionality
function initializeSorting() {
    const tables = document.querySelectorAll('.sortable');
    tables.forEach(table => {
        const headers = table.querySelectorAll('th');
        headers.forEach((header, index) => {
            if (!header.classList.contains('no-sort')) {
                header.style.cursor = 'pointer';
                header.addEventListener('click', () => {
                    sortTable(table, index);
                });
            }
        });
    });
}

// Add sort indicators to table headers
function addSortIndicators() {
    const sortableHeaders = document.querySelectorAll('.sortable th:not(.no-sort)');
    sortableHeaders.forEach(header => {
        // Only add if it doesn't already have one
        if (!header.querySelector('.sort-icon')) {
            const span = document.createElement('span');
            span.className = 'sort-icon ml-1 opacity-50';
            span.innerHTML = '⇅';
            header.appendChild(span);
        }
    });
}

// Animation initialization
function initializeAnimations() {
    // Animate district cards
    const cards = document.querySelectorAll('.district-card');
    cards.forEach((card, index) => {
        card.classList.add('animate-fade-in-up');
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Animate stats cards
    const statCards = document.querySelectorAll('.bg-white.rounded-2xl.shadow-md.p-6');
    statCards.forEach((card, index) => {
        card.classList.add('animate-fade-in-up');
        card.style.animationDelay = `${index * 0.05}s`;
    });
}

// Helper functions for searching tables
function initializeTableSearch(inputId, rowClass, noResultsId) {
    const searchInput = document.getElementById(inputId);
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll(rowClass);
            let hasResults = false;

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                    hasResults = true;
                } else {
                    row.style.display = 'none';
                }
            });

            const noResults = document.getElementById(noResultsId);
            if (noResults) {
                noResults.style.display = hasResults ? 'none' : 'block';
                
                // Also toggle the table visibility
                const tableContainer = noResults.closest('.bg-white.rounded-lg.shadow-md.overflow-hidden');
                if (tableContainer) {
                    const table = tableContainer.querySelector('table');
                    if (table) {
                        table.style.display = hasResults ? '' : 'none';
                    }
                }
            }
        });
    }
}

// Table sorting helper
function sortTable(table, column) {
    const tbody = table.querySelector('tbody');
    if (!tbody) return;
    
    const rows = Array.from(tbody.querySelectorAll('tr'));
    if (rows.length <= 1) return; // Nothing to sort
    
    // Get sort direction
    const th = table.querySelectorAll('th')[column];
    const isAsc = !th.classList.contains('sort-asc');
    
    try {
        const sortedRows = rows.sort((a, b) => {
            const aCell = a.querySelector(`td:nth-child(${column + 1})`);
            const bCell = b.querySelector(`td:nth-child(${column + 1})`);
            
            if (!aCell || !bCell) return 0;
            
            const aText = aCell.textContent.trim();
            const bText = bCell.textContent.trim();
            
            // Check if values are numbers
            const aNum = parseFloat(aText.replace(/[^\d.-]/g, ''));
            const bNum = parseFloat(bText.replace(/[^\d.-]/g, ''));
            
            if (!isNaN(aNum) && !isNaN(bNum)) {
                return isAsc ? aNum - bNum : bNum - aNum;
            }
            
            // Default to string comparison
            return isAsc ? 
                aText.localeCompare(bText, undefined, {sensitivity: 'base'}) :
                bText.localeCompare(aText, undefined, {sensitivity: 'base'});
        });

        // Update sort indicators
        table.querySelectorAll('th').forEach(th => {
            th.classList.remove('sort-asc', 'sort-desc');
            const icon = th.querySelector('.sort-icon');
            if (icon) icon.textContent = '⇅';
        });
        
        th.classList.add(isAsc ? 'sort-asc' : 'sort-desc');
        const icon = th.querySelector('.sort-icon');
        if (icon) icon.textContent = isAsc ? '↑' : '↓';

        // Clear and re-append rows
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        sortedRows.forEach(row => tbody.appendChild(row));
    } catch (error) {
        console.error('Error sorting table:', error);
        // Restore original order if error
        rows.forEach(row => tbody.appendChild(row));
    }
}

// Flash message handling
function initializeFlashMessages() {
    const messages = document.querySelectorAll('#successMessage, #errorMessage, #validationErrors');
    
    messages.forEach(message => {
        // Add close button
        const closeButton = document.createElement('button');
        closeButton.innerHTML = '<i class="fas fa-times"></i>';
        closeButton.className = 'ml-auto text-gray-400 hover:text-gray-600 transition-colors';
        closeButton.onclick = () => {
            message.classList.add('animate-fade-out');
            setTimeout(() => message.remove(), 300);
        };
        
        message.querySelector('div').appendChild(closeButton);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            if (message.isConnected) {
                message.classList.add('animate-fade-out');
                setTimeout(() => message.remove(), 300);
            }
        }, 5000);
    });
}

