document.addEventListener("DOMContentLoaded", function() {
    const bodyClassList = document.body.classList;
    let departmentValue = '';

    // Check the body classes and set the department value accordingly
    if (bodyClassList.contains('page-template-residential-sale')) {
        departmentValue = 'residential-sales';
    } else if (bodyClassList.contains('page-template-residential-letting')) {
        departmentValue = 'residential-lettings';
    } else if (bodyClassList.contains('page-template-agriculture-sale')) {
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

    // Set the corresponding department checkbox as checked if departmentValue is defined
    if (departmentValue) {
        const departmentCheckbox = document.querySelector(`input[name="department"][value="${departmentValue}"]`);
        const showAllCheckbox = document.querySelector('input[name="department"][value=""]');
        if (departmentCheckbox) {
            departmentCheckbox.checked = true;
            // Uncheck the "Show All" checkbox
            if (showAllCheckbox) {
                showAllCheckbox.checked = false;
            }
            console.log(`Department checkbox for ${departmentValue} is checked, "Show All" is unchecked.`);
        } else {
            console.log(`No department checkbox found for ${departmentValue}.`);
        }
    }

    // Automatically select the "Rent" toggle if the body class matches
    const isLettingPage = [...bodyClassList].some(className => className.startsWith('page-template-') && className.includes('-letting'));

    if (isLettingPage) {
        const lettingsRadio = document.getElementById('_parent_department_lettings');
        const salesRadio = document.getElementById('_parent_department_sales');

        if (lettingsRadio) lettingsRadio.checked = true;
        if (salesRadio) salesRadio.checked = false;
    } else {
        const salesRadio = document.getElementById('_parent_department_sales');
        const lettingsRadio = document.getElementById('_parent_department_lettings');

        if (salesRadio) salesRadio.checked = true;
        if (lettingsRadio) lettingsRadio.checked = false;
    }

    // Function to toggle slider visibility
    function toggleSliders() {
        const salesSlider = document.querySelector('.range-slider.sales-only');
        const lettingsSlider = document.querySelector('.range-slider.lettings-only');
        const priceTrigger = document.querySelector('.trigger--price');

        const salesRadio = document.getElementById('_parent_department_sales');
        const lettingsRadio = document.getElementById('_parent_department_lettings');

        if (salesRadio && salesRadio.checked) {
            salesSlider.style.display = 'flex';
            lettingsSlider.style.display = 'none';
            priceTrigger.textContent = 'Price';
        } else if (lettingsRadio && lettingsRadio.checked) {
            salesSlider.style.display = 'none';
            lettingsSlider.style.display = 'flex';
            priceTrigger.textContent = 'Rent';
        }
    }

    // Initialize the slider display based on the default selection
    toggleSliders();

    const salesRadio = document.getElementById('_parent_department_sales');
    const lettingsRadio = document.getElementById('_parent_department_lettings');

    if (salesRadio) salesRadio.addEventListener('change', toggleSliders);
    if (lettingsRadio) lettingsRadio.addEventListener('change', toggleSliders);

    // Range Slider Magic
    const minSliderSales = document.getElementById('minPriceSales');
    const maxSliderSales = document.getElementById('maxPriceSales');
    const minSliderLettings = document.getElementById('minPriceLettings');
    const maxSliderLettings = document.getElementById('maxPriceLettings');

    function updateSlider(sliderType) {
        let minSlider, maxSlider, sliderTrack;

        if (sliderType === 'sales') {
            minSlider = minSliderSales;
            maxSlider = maxSliderSales;
            sliderTrack = document.querySelector('.range-slider.sales-only .slider-track');
        } else {
            minSlider = minSliderLettings;
            maxSlider = maxSliderLettings;
            sliderTrack = document.querySelector('.range-slider.lettings-only .slider-track');
        }

        if (!minSlider || !maxSlider || !sliderTrack) return;

        let min = parseInt(minSlider.value);
        let max = parseInt(maxSlider.value);

        // Ensure min does not exceed max and cannot go below 0
        if (min > max - parseInt(minSlider.step)) {
            min = max - parseInt(minSlider.step);
            minSlider.value = min;
        }

        if (max < min + parseInt(maxSlider.step)) {
            max = min + parseInt(maxSlider.step);
            maxSlider.value = max;
        }

        const sliderRange = parseInt(maxSlider.max) - parseInt(minSlider.min);
        const minPercentage = ((min - parseInt(minSlider.min)) / sliderRange) * 100;
        const maxPercentage = ((max - parseInt(minSlider.min)) / sliderRange) * 100;

        sliderTrack.style.background = `linear-gradient(to right, #ddd 0%, #ddd ${minPercentage}%, #602644 ${minPercentage}%, #602644 ${maxPercentage}%, #ddd ${maxPercentage}%, #ddd 100%)`;
    }

    if (minSliderSales) minSliderSales.addEventListener('input', () => updateSlider('sales'));
    if (maxSliderSales) maxSliderSales.addEventListener('input', () => updateSlider('sales'));
    if (minSliderLettings) minSliderLettings.addEventListener('input', () => updateSlider('lettings'));
    if (maxSliderLettings) maxSliderLettings.addEventListener('input', () => updateSlider('lettings'));

    updateSlider('sales');
    updateSlider('lettings');

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

    function setupDropdowns() {
        document.querySelectorAll('.search-form-control--dropdown, .search-form-control--checkboxes').forEach(dropdownControl => {
            dropdownControl.addEventListener('click', function(event) {
                const dropdown = this.querySelector('.search-form-dropdown');

                if (event.target.tagName === 'INPUT' && event.target.type === 'range') {
                    return;
                }

                dropdown.classList.toggle('open');
            });
        });

        for (const option of document.querySelectorAll('.search-form-dropdown--option input[type="radio"]')) {
            option.addEventListener('change', function() {
                const selectedOption = this.closest('.search-form-dropdown--option');
                const dropdown = this.closest('.search-form-dropdown');
                dropdown.querySelector('.search-form-dropdown--trigger').textContent = selectedOption.textContent.trim();

                selectedOption.parentNode.querySelectorAll('.search-form-dropdown--option.selected').forEach(opt => {
                    opt.classList.remove('selected');
                });
                selectedOption.classList.add('selected');
            });
        }
    }

    function setupCheckboxes() {
        document.querySelectorAll('.search-form-control--checkboxes').forEach(checkboxGroup => {
            const checkboxes = checkboxGroup.querySelectorAll('.search-form-checkboxes--option input');
            const showAllCheckbox = checkboxes[0];

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    if (checkbox === showAllCheckbox && showAllCheckbox.checked) {
                        checkboxes.forEach(cb => {
                            if (cb !== showAllCheckbox) {
                                cb.checked = false;
                            }
                        });
                    } else if (checkbox !== showAllCheckbox) {
                        showAllCheckbox.checked = false;
                    }
                });
            });
        });
    }

    // Initialize all handlers
    setupDropdowns();
    setupCheckboxes();
    closeDropdownsOnClickOutside();

    // Function to identify the last visible .search-form-control (excluding submit) and apply the 'last-visible' class
    function markLastVisibleControl() {
        setTimeout(function() {
            const controls = document.querySelectorAll('.search-form-control');
            let lastVisibleControl = null;

            controls.forEach(function(control) {
                const style = window.getComputedStyle(control);
                if (
                    style.display !== 'none' &&
                    style.visibility !== 'hidden' &&
                    control.offsetParent !== null &&
                    !control.classList.contains('search-form-control--submit') // Exclude submit button
                ) {
                    lastVisibleControl = control;
                }
            });

            // Remove the 'last-visible' class from all controls first
            controls.forEach(control => {
                control.classList.remove('last-visible');
            });

            // Apply the 'last-visible' class to the last visible control
            if (lastVisibleControl) {
                lastVisibleControl.classList.add('last-visible');
            }
        }, 300); // 300ms delay to allow for any CSS changes
    }

    // Call the function to mark the last visible control
    markLastVisibleControl();

    // Event listener for tab change
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).attr('href'); // Get the href attribute which is the target tab
        var $slider = $(target).find('.inner-tabs.pr ul.properties');

        if ($slider.length > 0) {
            $slider.slick('refresh'); // Refresh SlickSlider to adjust its layout
        }
    });

    // Orderby
    jQuery('.stc-checkbox').on('change', function() {
        jQuery(this).closest('form').submit();
    });

    // Grid/List View Toggle Logic
    // Check if we're on the archive page
    // Check if we're on the archive page
    if (document.body.classList.contains("post-type-archive-property")) {

        // Get the triggers
        const listViewTrigger = document.querySelector(".view--list-view");
        const gridViewTrigger = document.querySelector(".view--grid-view");

        // Get the container
        const searchResultsContainer = document.querySelector(".search-results");

        // Function to toggle to list-view
        listViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("list-view");
            searchResultsContainer.classList.remove("grid-view");

            // Add active class to list-view trigger and remove from grid-view trigger
            listViewTrigger.classList.add("active");
            gridViewTrigger.classList.remove("active");
        });

        // Function to toggle to grid-view
        gridViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("grid-view");
            searchResultsContainer.classList.remove("list-view");

            // Add active class to grid-view trigger and remove from list-view trigger
            gridViewTrigger.classList.add("active");
            listViewTrigger.classList.remove("active");
        });
    }

});