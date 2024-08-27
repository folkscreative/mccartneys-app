document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

    // Function to set a form field value based on a URL parameter
    function setFieldValueFromUrl(paramName, fieldSelector) {
        const paramValue = urlParams.get(paramName);
        if (paramValue) {
            const field = document.querySelector(fieldSelector);
            if (field) {
                field.value = paramValue;
            }
        }
    }



    // Set address_keyword field value if present in URL
    setFieldValueFromUrl('address_keyword', 'input[name="address_keyword"]');

    // Set radius field value if present in URL
    const radiusValue = urlParams.get('radius');
    if (radiusValue) {
        const radiusInput = document.querySelector(`input[name="radius"][value="${radiusValue}"]`);
        if (radiusInput) {
            radiusInput.checked = true;
        }
    }

    // Set property_type checkboxes based on URL parameters
    const propertyType = urlParams.getAll('property_type');
    if (propertyType.length > 0) {
        document.querySelectorAll('input[name="property_type"]').forEach(checkbox => {
            if (propertyType.includes(checkbox.value)) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        });
    }

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
            if (showAllCheckbox) {
                showAllCheckbox.checked = false;
            }
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

    // Initialize the jQuery UI sliders for sales and lettings
    jQuery("#sales-slider-range").slider({
        range: true,
        min: 0,
        max: 10000000,
        values: [parseInt(urlParams.get('minimum_price')) || 0, parseInt(urlParams.get('maximum_price')) || 10000000],
        step: 50000,
        slide: function(event, ui) {
            jQuery("#minValueSales").text("£" + ui.values[0].toLocaleString());
            jQuery("#maxValueSales").text("£" + ui.values[1].toLocaleString());
            jQuery("#minimum_price_input").val(ui.values[0]);
            jQuery("#maximum_price_input").val(ui.values[1]);
            updateSliderFill("#sales-slider-range", ui.values);
        }
    });

    jQuery("#lettings-slider-range").slider({
        range: true,
        min: 0,
        max: 10000,
        values: [parseInt(urlParams.get('minimum_rent')) || 0, parseInt(urlParams.get('maximum_rent')) || 10000],
        step: 250,
        slide: function(event, ui) {
            jQuery("#minValueLettings").text("£" + ui.values[0].toLocaleString() + " pcm");
            jQuery("#maxValueLettings").text("£" + ui.values[1].toLocaleString() + " pcm");
            jQuery("#minimum_rent_input").val(ui.values[0]);
            jQuery("#maximum_rent_input").val(ui.values[1]);
            updateSliderFill("#lettings-slider-range", ui.values);
        }
    });

    // Update the slider fill on initial load
    updateSliderFill("#sales-slider-range", jQuery("#sales-slider-range").slider("values"));
    updateSliderFill("#lettings-slider-range", jQuery("#lettings-slider-range").slider("values"));

    // Function to update the slider fill
    function updateSliderFill(sliderId, values) {
        const slider = jQuery(sliderId);
        const sliderRange = slider.slider("option", "max") - slider.slider("option", "min");
        const minPercentage = ((values[0] - slider.slider("option", "min")) / sliderRange) * 100;
        const maxPercentage = ((values[1] - slider.slider("option", "min")) / sliderRange) * 100;

        slider.find(".ui-slider-range").css({
            "left": minPercentage + "%",
            "width": (maxPercentage - minPercentage) + "%"
        });
    }

    // Function to toggle slider visibility
    function toggleSliders() {
        const salesSlider = jQuery('.range-slider.sales-only');
        const lettingsSlider = jQuery('.range-slider.lettings-only');
        const priceTrigger = jQuery('.trigger--price');

        if (jQuery('#_parent_department_sales').is(':checked')) {
            salesSlider.show();
            lettingsSlider.hide();
            priceTrigger.text('Price');
        } else if (jQuery('#_parent_department_lettings').is(':checked')) {
            salesSlider.hide();
            lettingsSlider.show();
            priceTrigger.text('Rent');
        }
    }

    // Initialize the slider display based on the default selection
    toggleSliders();

    jQuery('#_parent_department_sales, #_parent_department_lettings').change(toggleSliders);

    // Form submission logic to ensure correct slider values are submitted
    jQuery('form').on('submit', function() {
        if (jQuery('#_parent_department_lettings').is(':checked')) {
            jQuery("#minimum_price_input").removeAttr('name');
            jQuery("#maximum_price_input").removeAttr('name');
        } else {
            jQuery("#minimum_rent_input").removeAttr('name');
            jQuery("#maximum_rent_input").removeAttr('name');
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

                // Close the dropdown after selection
                dropdown.classList.remove('open');
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

    // Initialize Google Places Autocomplete on the location input field
    const locationInput = document.getElementById('address_keyword');
    if (locationInput) {
        const autocomplete = new google.maps.places.Autocomplete(locationInput, {
            types: ['(regions)'], // Restrict suggestions to addresses and places
            componentRestrictions: { country: 'uk' } // Restrict to a specific country (optional)
        });

        // If you want to handle the place selection (e.g., to get latitude and longitude), you can do so here
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            // Do some things in here


        });
    }


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

    // Grid/List View Toggle Logic with Local Storage
    if (document.body.classList.contains("post-type-archive-property")) {

        const listViewTrigger = document.querySelector(".view--list-view");
        const gridViewTrigger = document.querySelector(".view--grid-view");
        const searchResultsContainer = document.querySelector(".search-results");

        // Check localStorage for view preference
        const savedView = localStorage.getItem('viewMode');

        // Apply saved view mode
        if (savedView === 'list') {
            searchResultsContainer.classList.add("list-view");
            searchResultsContainer.classList.remove("grid-view");
            listViewTrigger.classList.add("active");
            gridViewTrigger.classList.remove("active");
        } else {
            searchResultsContainer.classList.add("grid-view");
            searchResultsContainer.classList.remove("list-view");
            gridViewTrigger.classList.add("active");
            listViewTrigger.classList.remove("active");
        }

        // Function to toggle to list-view and save preference
        listViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("list-view");
            searchResultsContainer.classList.remove("grid-view");
            localStorage.setItem('viewMode', 'list');

            listViewTrigger.classList.add("active");
            gridViewTrigger.classList.remove("active");
        });

        // Function to toggle to grid-view and save preference
        gridViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("grid-view");
            searchResultsContainer.classList.remove("list-view");
            localStorage.setItem('viewMode', 'grid');

            gridViewTrigger.classList.add("active");
            listViewTrigger.classList.remove("active");
        });
    }

    // Sold STC URL Params
    const includeSoldStcCheckbox = document.querySelector('.stc-checkbox-control');

    if (includeSoldStcCheckbox) {
        includeSoldStcCheckbox.addEventListener('change', function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (includeSoldStcCheckbox.checked) {
                urlParams.set('include_sold_stc', '1');
            } else {
                urlParams.delete('include_sold_stc');
            }

            // Create the new URL with updated parameters
            const newUrl = `${window.location.pathname}?${urlParams.toString()}`;

            // Reload the page with the new URL
            window.location.href = newUrl;
        });
    }



    // Slick Slider refresh on tab change
    jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = jQuery(e.target).attr('href'); // Get the href attribute which is the target tab
        var $slider = jQuery(target).find('.inner-tabs.pr ul.properties');

        if ($slider.length > 0) {
            $slider.slick('refresh'); // Refresh SlickSlider to adjust its layout
        }
    });

});