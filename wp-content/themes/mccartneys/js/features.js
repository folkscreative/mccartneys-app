document.addEventListener("DOMContentLoaded", function() {
    const bodyClassList = document.body.classList;
    let departmentValue = '';

    if (bodyClassList.contains('page-template-residential-sale')) {
        departmentValue = 'residential-sales';
    } else if (bodyClassList.contains('page-template-residential-letting')) {
        departmentValue = 'residential-lettings';
    } else if (bodyClassList.contains('page-template-agricultural-sale')) {
        departmentValue = 'agricultural';
    } else if (bodyClassList.contains('page-template-commercial-letting')) {
        departmentValue = 'commercial';
    } else if (bodyClassList.contains('page-template-commercial-sale')) {
        departmentValue = 'commercial';
    } else if (bodyClassList.contains('page-template-new-home')) {
        departmentValue = 'new-homes';
    } else if (bodyClassList.contains('page-template-fine-country')) {
        departmentValue = 'fine-and-country';
    } else if (bodyClassList.contains('page-template-property-land-for-auction')) {
        departmentValue = 'property-land-auctions';
    } else if (bodyClassList.contains('page-template-development-lands')) {
        departmentValue = 'development-land';
    } else if (bodyClassList.contains('page-template-agriculture-letting')) {
        departmentValue = 'agricultural';
    }



    // Set the value of the form field
    const departmentField = document.querySelector('select[name="department"]');
    if (departmentField) {
        departmentField.value = departmentValue;
    }

    // Set a delay before identifying the last visible .control div so that PH functions can run and hide the relevant fields
    setTimeout(function() {
        const controls = document.querySelectorAll('.control');
        let lastVisibleControl = null;

        controls.forEach(function(control) {
            const style = window.getComputedStyle(control);
            if (style.display !== 'none' && style.visibility !== 'hidden' && control.offsetParent !== null) {
                lastVisibleControl = control;
            }
        });

        if (lastVisibleControl) {
            lastVisibleControl.classList.add('last-visible');
        }
    }, 300); // 300ms delay
});


// Helper function to close dropdowns if clicked outside
function closeDropdownsOnClickOutside() {
    window.addEventListener('click', function(e) {
        // Radius dropdown
        const radiusSelect = document.querySelector('.search-form-control--dropdown.search-form--radius');
        if (!radiusSelect.contains(e.target)) {
            radiusSelect.querySelector('.search-form-dropdown').classList.remove('open');
        }

        // Price dropdown
        const priceSelect = document.querySelector('.search-form-control--dropdown.search-form--price');
        if (!priceSelect.contains(e.target)) {
            priceSelect.querySelector('.search-form-dropdown').classList.remove('open');
        }

        // Type dropdown
        const typeSelect = document.querySelector('.search-form-control--checkboxes.search-form--type');
        if (!typeSelect.contains(e.target)) {
            typeSelect.querySelector('.search-form-dropdown').classList.remove('open');
        }
    });
}

// Dropdown toggle functionality
function setupDropdowns() {
    // Radius dropdown
    document.querySelector('.search-form-control--dropdown.search-form--radius').addEventListener('click', function() {
        this.querySelector('.search-form-dropdown').classList.toggle('open');
    });

    // Price dropdown
    document.querySelector('.search-form-control--dropdown.search-form--price').addEventListener('click', function() {
        this.querySelector('.search-form-dropdown').classList.toggle('open');
    });

    // Type dropdown
    document.querySelector('.search-form-control--checkboxes.search-form--type').addEventListener('click', function() {
        this.querySelector('.search-form-dropdown').classList.toggle('open');
    });

    // Set selected text and ensure only one radio is selected at a time
    for (const option of document.querySelectorAll('.search-form-dropdown--option input[type="radio"]')) {
        option.addEventListener('change', function() {
            const selectedOption = this.closest('.search-form-dropdown--option');
            const dropdown = this.closest('.search-form-dropdown');
            dropdown.querySelector('.search-form-dropdown--trigger').textContent = selectedOption.textContent.trim();

            // Unselect others and select this
            selectedOption.parentNode.querySelectorAll('.search-form-dropdown--option.selected').forEach(opt => {
                opt.classList.remove('selected');
            });
            selectedOption.classList.add('selected');
        });
    }
}

// Checkbox behaviour
function setupCheckboxes() {
    const checkboxes = document.querySelectorAll('.search-form-checkboxes--option input');
    const showAllCheckbox = checkboxes[0]; // assuming 'Show All' is the first checkbox

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox === showAllCheckbox && showAllCheckbox.checked) {
                // Deselect other checkboxes if "Show All" is checked
                checkboxes.forEach(cb => {
                    if (cb !== showAllCheckbox) {
                        cb.checked = false;
                    }
                });
            } else if (checkbox !== showAllCheckbox) {
                // Deselect "Show All" if any other checkbox is selected
                showAllCheckbox.checked = false;
            }
        });
    });
}

// Initialize all handlers
document.addEventListener('DOMContentLoaded', function() {
    setupDropdowns();
    setupCheckboxes();
    closeDropdownsOnClickOutside();
});