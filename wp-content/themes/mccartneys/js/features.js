document.addEventListener("DOMContentLoaded", function() {
    const bodyClassList = document.body.classList;
    let departmentValue = '';

    // Determine department value based on body class
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

    // Set a delay before identifying the last visible .control div
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

    // Initialize range sliders and controls
    const salesRadio = document.getElementById('_parent_department_sales');
    const lettingsRadio = document.getElementById('_parent_department_lettings');
    const salesSlider = document.querySelector('.range-slider.sales-only');
    const lettingsSlider = document.querySelector('.range-slider.lettings-only');

    // Function to toggle slider visibility
    function toggleSliders() {
        if (salesRadio && salesRadio.checked) {
            salesSlider.style.display = 'flex';
            lettingsSlider.style.display = 'none';
        } else if (lettingsRadio && lettingsRadio.checked) {
            salesSlider.style.display = 'none';
            lettingsSlider.style.display = 'flex';
        }
    }

    // Initialize the slider display based on the default selection
    toggleSliders();

    // Add event listeners for radio buttons to toggle sliders
    if (salesRadio) salesRadio.addEventListener('change', toggleSliders);
    if (lettingsRadio) lettingsRadio.addEventListener('change', toggleSliders);

    // Range Slider Magic
    const minSliderSales = document.getElementById('minPriceSales');
    const maxSliderSales = document.getElementById('maxPriceSales');
    const minValueSales = document.getElementById('minValueSales');
    const maxValueSales = document.getElementById('maxValueSales');
    const minSliderLettings = document.getElementById('minPriceLettings');
    const maxSliderLettings = document.getElementById('maxPriceLettings');
    const minValueLettings = document.getElementById('minValueLettings');
    const maxValueLettings = document.getElementById('maxValueLettings');

    function updateSlider(sliderType) {
        let minSlider, maxSlider, minValue, maxValue;

        if (sliderType === 'sales') {
            minSlider = minSliderSales;
            maxSlider = maxSliderSales;
            minValue = minValueSales;
            maxValue = maxValueSales;
        } else {
            minSlider = minSliderLettings;
            maxSlider = maxSliderLettings;
            minValue = minValueLettings;
            maxValue = maxValueLettings;
        }

        if (!minSlider || !maxSlider || !minValue || !maxValue) return;

        let min = parseInt(minSlider.value);
        let max = parseInt(maxSlider.value);

        // Ensure min does not exceed max
        if (min > max - 5000) {
            min = max - 5000;
            minSlider.value = min;
        }

        // Ensure max does not fall below min
        if (max < min + 5000) {
            max = min + 5000;
            maxSlider.value = max;
        }

        // Update displayed values
        minValue.textContent = `£${min.toLocaleString()}`;
        maxValue.textContent = `£${max.toLocaleString()}`;

        // Calculate slider track fill
        const minPercentage = ((min - minSlider.min) / (maxSlider.max - minSlider.min)) * 100;
        const maxPercentage = ((max - minSlider.min) / (maxSlider.max - minSlider.min)) * 100;

        // Set the gradient to correctly fill between the handles
        const sliderTrack = sliderType === 'sales' ? salesSlider.querySelector('.slider-track') : lettingsSlider.querySelector('.slider-track');
        if (sliderTrack) {
            sliderTrack.style.background = `linear-gradient(to right, #ddd 0%, #ddd ${minPercentage}%, #602644 ${minPercentage}%, #602644 ${maxPercentage}%, #ddd ${maxPercentage}%, #ddd 100%)`;
        }
    }

    // Add event listeners to update sliders
    if (minSliderSales) minSliderSales.addEventListener('input', () => updateSlider('sales'));
    if (maxSliderSales) maxSliderSales.addEventListener('input', () => updateSlider('sales'));
    if (minSliderLettings) minSliderLettings.addEventListener('input', () => updateSlider('lettings'));
    if (maxSliderLettings) maxSliderLettings.addEventListener('input', () => updateSlider('lettings'));

    // Initialize the slider values
    updateSlider('sales'); // Initialize sales slider on load

    // Form submission logic to ensure correct slider values are submitted
    document.querySelector('form').addEventListener('submit', function(e) {
        if (lettingsRadio && lettingsRadio.checked) {
            if (minSliderSales) minSliderSales.removeAttribute('name');
            if (maxSliderSales) maxSliderSales.removeAttribute('name');
            if (minSliderLettings) minSliderLettings.setAttribute('name', 'minimum_rent');
            if (maxSliderLettings) maxSliderLettings.setAttribute('name', 'maximum_rent');
        } else {
            if (minSliderLettings) minSliderLettings.removeAttribute('name');
            if (maxSliderLettings) maxSliderLettings.removeAttribute('name');
            if (minSliderSales) minSliderSales.setAttribute('name', 'minimum_price');
            if (maxSliderSales) maxSliderSales.setAttribute('name', 'maximum_price');
        }
    });

    // Helper function to close dropdowns if clicked outside
    function closeDropdownsOnClickOutside() {
        window.addEventListener('click', function(e) {
            const dropdowns = document.querySelectorAll('.search-form-dropdown');

            dropdowns.forEach(dropdown => {
                const isClickInside = dropdown.contains(e.target);

                if (!isClickInside) {
                    dropdown.classList.remove('open');
                }
            });
        });
    }

    // Dropdown toggle functionality
    function setupDropdowns() {
        // Add click listeners to toggle dropdowns
        document.querySelectorAll('.search-form-control--dropdown, .search-form-control--checkboxes').forEach(dropdownControl => {
            dropdownControl.addEventListener('click', function(event) {
                const dropdown = this.querySelector('.search-form-dropdown');

                // Prevent closing the dropdown when clicking on the sliders
                if (event.target.tagName === 'INPUT' && event.target.type === 'range') {
                    return;
                }

                dropdown.classList.toggle('open');
            });
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
    setupDropdowns();
    setupCheckboxes();
    closeDropdownsOnClickOutside();
});