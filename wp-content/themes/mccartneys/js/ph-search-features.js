document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    updatePriceAndRentFields();

    // Set the department and toggle state based on body class
    function setDepartmentFromBodyClass() {
        const bodyClassList = document.body.classList;
        let departmentValue = '';

        if (bodyClassList.contains('page-template-residential-sale')) {
            departmentValue = 'residential-sales';
            document.getElementById('_parent_department_sales').checked = true;
        } else if (bodyClassList.contains('page-template-residential-letting')) {
            departmentValue = 'residential-lettings';
            document.getElementById('_parent_department_lettings').checked = true;
        } else if (bodyClassList.contains('page-template-agriculture-sale')) {
            departmentValue = 'agricultural';
            document.getElementById('_parent_department_sales').checked = true;
        } else if (bodyClassList.contains('page-template-agriculture-letting')) {
            departmentValue = 'agricultural';
            document.getElementById('_parent_department_lettings').checked = true;
        } else if (bodyClassList.contains('page-template-commercial-sale')) {
            departmentValue = 'commercial';
            document.getElementById('_parent_department_sales').checked = true;
        } else if (bodyClassList.contains('page-template-commercial-letting')) {
            departmentValue = 'commercial';
            document.getElementById('_parent_department_lettings').checked = true;
        } else if (bodyClassList.contains('page-template-new-home')) {
            departmentValue = 'new-homes';
        } else if (bodyClassList.contains('page-template-fine-country')) {
            departmentValue = 'fine-and-country';
        } else if (bodyClassList.contains('page-template-property-land-for-auction')) {
            departmentValue = 'property-land-auctions';
        } else if (bodyClassList.contains('page-template-development-lands')) {
            departmentValue = 'development-land';
        }

        const departmentField = document.querySelector('input[name="department"]');
        if (departmentField && departmentValue) {
            departmentField.value = departmentValue;
        }
    }



    // Handle Buy/Rent toggle based on URL parameter or body class
    function setToggleFromUrlOrBodyClass() {
        const departmentParam = urlParams.get('_parent_department');
        const salesRadio = document.getElementById('_parent_department_sales');
        const lettingsRadio = document.getElementById('_parent_department_lettings');
        const isLettingPage = [...document.body.classList].some(className => className.includes('-letting') || className.includes('-lettings'));

        if (departmentParam === 'Lettings' || isLettingPage) {
            lettingsRadio.checked = true;
            salesRadio.checked = false;
        } else {
            salesRadio.checked = true; // Default to Sales if no matching condition
            lettingsRadio.checked = false;
        }
    }

    // Initialize the department and toggle state
    setDepartmentFromBodyClass();
    setToggleFromUrlOrBodyClass();


    const departmentField = document.querySelector('input[name="department"]');
    const salesRadio = document.getElementById('_parent_department_sales');
    const lettingsRadio = document.getElementById('_parent_department_lettings');
    const bodyClassList = document.body.classList;
    let initialDepartmentValue = departmentField ? departmentField.value : '';

    // Check if the URL contains department parameter
    const departmentParam = urlParams.get('department');

    // Check if the body class is .home or .post-type-archive-property
    const isHomeOrArchivePage = bodyClassList.contains('home') || bodyClassList.contains('post-type-archive-property');

    // Function to handle toggle change
    function handleBuyRentToggle() {
        if (lettingsRadio.checked) {
            // Rent is selected
            if (!departmentParam && isHomeOrArchivePage) {
                departmentField.value = 'residential-lettings';
            } else if (departmentParam === 'residential-sales') {
                departmentField.value = 'residential-lettings';
            }
        } else if (salesRadio.checked) {
            // Buy is selected
            if (!departmentParam && isHomeOrArchivePage) {
                departmentField.value = ''; // Reset to initial unset state
            } else if (departmentParam === 'residential-sales') {
                departmentField.value = 'residential-sales';
            } else if (departmentParam === 'residential-lettings') {
                departmentField.value = 'residential-sales';
            }
        }
    }

    // Set initial state when page loads
    function setInitialBuyRentState() {
        if (lettingsRadio.checked) {
            handleBuyRentToggle();
        }
    }

    // Add event listeners to the Buy/Rent toggle radio buttons
    salesRadio.addEventListener('change', handleBuyRentToggle);
    lettingsRadio.addEventListener('change', handleBuyRentToggle);

    // Set the initial state on page load
    setInitialBuyRentState();

    function updateFieldFromURL(param, fieldSelector) {
        const value = urlParams.get(param);
        const field = document.querySelector(fieldSelector);

        if (value !== null && field) {
            if (!field.value) { // Only set value if it is empty
                field.value = value;
                console.log(`Setting ${param}: ${value}, Field: ${fieldSelector}, Value: ${field.value}`);
            } else {
                console.log(`Field ${fieldSelector} already has a value: ${field.value}, skipping update.`);
            }
        } else {
            if (!field) {
                console.log(`Field ${fieldSelector} not found in DOM`);
            } else {
                console.log(`${param} not found in URL`);
            }
        }
    }






    function updatePriceAndRentFields() {
        const department = urlParams.get('department');
        const isSales = urlParams.get('_parent_department') === 'Sales';
        const isLettings = urlParams.get('_parent_department') === 'Lettings';

        // Avoid clearing the fields at the beginning of the function
        // Only clear fields when necessary
        // Only clear the fields if they haven't been set yet
        if (!jQuery("#commercial_minimum_price_input").val() && !jQuery("#commercial_maximum_price_input").val()) {
            // Clear fields here only if necessary
            jQuery("#commercial_minimum_price_input").val("");
            jQuery("#commercial_maximum_price_input").val("");
        }

        if (department === 'commercial') {
            if (isSales) {
                updateFieldFromURL('commercial_minimum_price', '#commercial_minimum_price_input');
                updateFieldFromURL('commercial_maximum_price', '#commercial_maximum_price_input');
            } else if (isLettings) {
                updateFieldFromURL('commercial_minimum_rent', '#commercial_minimum_rent_input');
                updateFieldFromURL('commercial_maximum_rent', '#commercial_maximum_rent_input');
            }
        } else {
            if (isSales) {
                updateFieldFromURL('minimum_price', '#minimum_price_input');
                updateFieldFromURL('maximum_price', '#maximum_price_input');
            } else if (isLettings) {
                updateFieldFromURL('minimum_rent', '#minimum_rent_input');
                updateFieldFromURL('maximum_rent', '#maximum_rent_input');
            }
        }
    }


    // Function to update the hidden field based on department and parent department selection
    function updateCommercialHiddenField() {
        const department = document.querySelector('input[name="department"]').value;
        const isSalesChecked = document.getElementById('_parent_department_sales').checked;
        const isLettingsChecked = document.getElementById('_parent_department_lettings').checked;
        const hiddenField = document.getElementById('commercial_for_sale_to_rent'); // Hidden field

        if (department === 'commercial') {
            if (isSalesChecked) {
                hiddenField.value = 'for_sale';
            } else if (isLettingsChecked) {
                hiddenField.value = 'to_rent';
            }
        } else {
            hiddenField.value = ''; // Clear the hidden field if not commercial
        }
    }







    // Run the field updates and handle URL params
    updatePriceAndRentFields();
    updateCommercialHiddenField();





    // Add event listeners for Sales/Lettings toggle changes
    salesRadio.addEventListener('change', function () {
        handleBuyRentToggle(); // Existing function
        updateCommercialHiddenField();
    });

    lettingsRadio.addEventListener('change', function () {
        handleBuyRentToggle(); // Existing function
        updateCommercialHiddenField();
    });


    // Set form field values based on URL parameters
    function setFieldValueFromUrl(paramName, fieldSelector) {
        const paramValue = urlParams.get(paramName);
        if (paramValue) {
            const field = document.querySelector(fieldSelector);
            if (field) {
                field.value = paramValue; // Set the actual input field value
            }
        }
    }








    // Update the price/rent sliders and hidden fields based on the URL parameters
    function updateSlidersAndInputsFromUrl(sliderType) {
        let minValue, maxValue;

        if (sliderType === 'sales') {
            minValue = parseInt(jQuery('input[name="minimum_price"]').val()) || 0;
            maxValue = parseInt(jQuery('input[name="maximum_price"]').val()) || 3500000;

            jQuery("#sales-slider-range").slider('values', [minValue, maxValue]);
            updatePriceTriggerFields('sales');
        } else if (sliderType === 'lettings') {
            minValue = parseInt(jQuery('input[name="minimum_rent"]').val()) || 0;
            maxValue = parseInt(jQuery('input[name="maximum_rent"]').val()) || 5000;

            jQuery("#lettings-slider-range").slider('values', [minValue, maxValue]);
            updatePriceTriggerFields('lettings');
        } else if (sliderType === 'commercial_sales') {
            minValue = parseInt(jQuery('input[name="commercial_minimum_price"]').val()) || 0;
            maxValue = parseInt(jQuery('input[name="commercial_maximum_price"]').val()) || 3500000;

            jQuery("#commercial-sales-slider-range").slider('values', [minValue, maxValue]);
            updatePriceTriggerFields('commercial_sales');
        } else if (sliderType === 'commercial_lettings') {
            minValue = parseInt(jQuery('input[name="commercial_minimum_rent"]').val()) || 0;
            maxValue = parseInt(jQuery('input[name="commercial_maximum_rent"]').val()) || 5000;

            jQuery("#commercial-lettings-slider-range").slider('values', [minValue, maxValue]);
            updatePriceTriggerFields('commercial_lettings');
        }
    }








    // Set the department field value if present in URL
    function setDepartmentFromUrl() {
        const departmentValue = urlParams.get('department');
        if (departmentValue) {
            const departmentField = document.querySelector('input[name="department"]');
            if (departmentField) {
                departmentField.value = departmentValue;
            }
        }
    }

    setDepartmentFromUrl();
    updateCommercialHiddenField();

    // Set address_keyword field value if present in URL
    setFieldValueFromUrl('address_keyword', 'input[name="address_keyword"]');

    // Set radius field value if present in URL
    function setRadiusFromUrl() {
        const radiusValue = urlParams.get('radius');
        if (radiusValue) {
            const radiusInput = document.querySelector(`input[name="radius"][value="${radiusValue}"]`);
            if (radiusInput) {
                radiusInput.checked = true;
                document.querySelector('.search-form--radius .search-form-dropdown--trigger').textContent = `${radiusInput.nextElementSibling.textContent.trim()}`;
            }
        }
    }
    setRadiusFromUrl();

    // Function to set property type based on department
    function setCheckboxesFromUrl(paramName, fieldSelector) {
        const paramValues = urlParams.getAll(paramName);

        // Set checkboxes based on URL parameters
        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            if (paramValues.includes(checkbox.value)) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false; // Ensure only the specified checkboxes are checked
            }
        });

        // After setting all checkboxes, update the count based on actual selections
        updateSelectedCount(fieldSelector);
    }

    // Function to count selected checkboxes and update the display
    function updateSelectedCount(fieldSelector) {
        const checkboxes = document.querySelectorAll(fieldSelector);
        let selectedCount = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked && checkbox.value !== '') {
                selectedCount++;
            }
        });

        updateTriggerText(selectedCount);
    }

    // Function to handle checkbox changes for property type or commercial property type
    function handleCheckboxChange(department, clickedCheckbox = null) {
        const fieldSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';
        const showAllCheckboxSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"][value=""]' : 'input[name="property_type[]"][value=""]';
        const showAllCheckbox = document.querySelector(showAllCheckboxSelector);

        // If "Show All" is clicked, clear all other checkboxes
        if (clickedCheckbox === showAllCheckbox) {
            document.querySelectorAll(fieldSelector).forEach(checkbox => {
                checkbox.checked = false; // Uncheck all other checkboxes
                const parentElement = checkbox.closest('.search-form-checkboxes--option');
                if (parentElement) {
                    parentElement.classList.remove('checked'); // Remove checked class from parent
                }
            });
            showAllCheckbox.checked = true; // Ensure "Show All" is checked
        } else {
            // If any other checkbox is clicked, "Show All" should be unchecked
            showAllCheckbox.checked = false;

            // Toggle the clicked checkbox and update its parent class
            if (clickedCheckbox) {
                const parentElement = clickedCheckbox.closest('.search-form-checkboxes--option');
                if (clickedCheckbox.checked) {
                    parentElement.classList.add('checked');
                } else {
                    parentElement.classList.remove('checked');
                }
            }

            // Check the total number of selected checkboxes after the change
            const selectedCount = document.querySelectorAll(`${fieldSelector}:checked`).length;

            // If no checkboxes are selected, automatically select "Show All"
            if (selectedCount === 0) {
                showAllCheckbox.checked = true;
            }
        }

        // Always update the selected count after any user change
        updateSelectedCount(fieldSelector);
    }

    // Function to manually update the count of selected checkboxes
    function updateSelectedCount(fieldSelector) {
        const showAllCheckboxSelector = fieldSelector.includes('commercial') ?
            'input[name="commercial_property_type[]"][value=""]' :
            'input[name="property_type[]"][value=""]';
        const showAllCheckbox = document.querySelector(showAllCheckboxSelector);

        // Count the selected checkboxes, excluding "Show All"
        const selectedCount = document.querySelectorAll(`${fieldSelector}:checked`).length;
        const actualSelectedCount = showAllCheckbox.checked ? 0 : selectedCount; // Don't count if "Show All" is checked

        const triggerElement = document.querySelector('.search-form--type .search-form-dropdown--trigger');

        if (triggerElement) {
            if (actualSelectedCount > 0) {
                triggerElement.textContent = `${actualSelectedCount} Selected`;
            } else {
                triggerElement.textContent = 'Property Type';
            }
        }
    }

    // Function to disable checkbox event listeners during initialization
    function disableCheckboxEventListeners(fieldSelector) {
        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            checkbox.setAttribute('data-listener-disabled', 'true'); // Flag that disables event listener temporarily
        });
    }

    // Function to re-enable checkbox event listeners after initial load
    function enableCheckboxEventListeners(department, fieldSelector) {
        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            checkbox.removeAttribute('data-listener-disabled'); // Re-enable listeners by removing flag

            // Only attach event listener if it's not already disabled
            checkbox.addEventListener('change', function () {
                if (!checkbox.getAttribute('data-listener-disabled')) {
                    handleCheckboxChange(department, this);
                }
            });
        });
    }


    // Initialize the property type logic
    function initializePropertyTypeLogic() {
        const department = urlParams.get('department');
        const fieldSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';
        const paramName = department === 'commercial' ? 'commercial_property_type[]' : 'property_type[]';
        const showAllCheckboxSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"][value=""]' : 'input[name="property_type[]"][value=""]';
        const showAllCheckbox = document.querySelector(showAllCheckboxSelector);

        // Disable event listeners during initialization to avoid double counting
        disableCheckboxEventListeners(fieldSelector);

        // Manually set checkboxes from URL parameters without triggering change events
        setCheckboxesFromUrl(paramName, fieldSelector);

        // Ensure checked class is added to parent elements for pre-selected checkboxes on page load
        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            const parentElement = checkbox.closest('.search-form-checkboxes--option');
            if (parentElement) {
                if (checkbox.checked) {
                    parentElement.classList.add('checked');
                } else {
                    parentElement.classList.remove('checked');
                }
            }
        });

        // Automatically select "Show All" if no other checkboxes are selected on page load
        const selectedCount = document.querySelectorAll(`${fieldSelector}:checked`).length;
        if (selectedCount === 0) {
            showAllCheckbox.checked = true; // Automatically check "Show All" if no values are selected
        } else {
            showAllCheckbox.checked = false; // Deselect "Show All" if other checkboxes are selected
        }

        // Re-enable checkbox event listeners after initialization
        enableCheckboxEventListeners(department, fieldSelector);

        // Manually update the selected count on page load without triggering events
        updateSelectedCount(fieldSelector);

        // Add event listener to "Show All" checkbox to clear all other selections when selected
        showAllCheckbox.addEventListener('change', function () {
            handleCheckboxChange(department, this);
        });
    }



    // Call the function on page load
    initializePropertyTypeLogic();

    // Update trigger text for property type
    function updateTriggerText(selectedCount) {
        const triggerElement = document.querySelector('.search-form--type .search-form-dropdown--trigger');
        if (triggerElement) {
            if (selectedCount > 0) {
                triggerElement.textContent = `${selectedCount} Selected`;
            } else {
                triggerElement.textContent = 'Property Type';
            }
        }
    }

    // Handle slider toggles and price updates
    function toggleSliders() {
        const salesSlider = jQuery('.range-slider.sales-only');
        const lettingsSlider = jQuery('.range-slider.lettings-only');
        const priceTrigger = jQuery('.trigger--price');

        if (jQuery('#_parent_department_sales').is(':checked')) {
            salesSlider.show();
            lettingsSlider.hide();
            updatePriceTrigger('sales');
            updateCommercialHiddenField();
        } else if (jQuery('#_parent_department_lettings').is(':checked')) {
            salesSlider.hide();
            lettingsSlider.show();
            updatePriceTrigger('lettings');
            updateCommercialHiddenField();
        }
    }

    // Ensure that the triggers and sliders are updated correctly
    function updatePriceTriggerFields(sliderType) {
        let minValue, maxValue, triggerElement;

        if (sliderType === 'sales') {
            minValue = jQuery("#minValueSales").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueSales").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price.sales');

            // Ensure the input fields are updated
            jQuery('input[name="minimum_price"]').val(minValue);
            jQuery('input[name="maximum_price"]').val(maxValue);
        } else if (sliderType === 'lettings') {
            minValue = jQuery("#minValueLettings").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueLettings").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price.lettings');

            // Ensure the input fields are updated
            jQuery('input[name="minimum_rent"]').val(minValue);
            jQuery('input[name="maximum_rent"]').val(maxValue);
        } else if (sliderType === 'commercial_sales') {
            minValue = jQuery("#minValueSales").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueSales").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price.commercial-sales');

            // Ensure the input fields are updated
            jQuery('input[name="commercial_minimum_price"]').val(minValue);
            jQuery('input[name="commercial_maximum_price"]').val(maxValue);
        } else if (sliderType === 'commercial_lettings') {
            minValue = jQuery("#minValueLettings").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueLettings").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price.commercial-lettings');

            // Ensure the input fields are updated
            jQuery('input[name="commercial_minimum_rent"]').val(minValue);
            jQuery('input[name="commercial_maximum_rent"]').val(maxValue);
        }

        // Update the trigger text to reflect the current values
        minValue = parseInt(minValue);
        maxValue = parseInt(maxValue);

        const isDefaultRange = (sliderType === 'sales' && minValue === 0 && maxValue === 3500000) ||
            (sliderType === 'lettings' && minValue === 0 && maxValue === 5000) ||
            (sliderType === 'commercial_sales' && minValue === 0 && maxValue === 3500000) ||
            (sliderType === 'commercial_lettings' && minValue === 0 && maxValue === 5000);

        // Update the trigger text based on the range
        if (isDefaultRange && sliderType === 'sales') {
            triggerElement.text('Price');
        } else if (isDefaultRange && sliderType === 'lettings') {
            triggerElement.text('Rent');
        } else if (isDefaultRange && sliderType === 'commercial_sales') {
            triggerElement.text('Commercial Price');
        } else if (isDefaultRange && sliderType === 'commercial_lettings') {
            triggerElement.text('Commercial Rent');
        } else {
            const minAbbreviated = abbreviatePrice(minValue);
            const maxAbbreviated = abbreviatePrice(maxValue);
            triggerElement.text(`${minAbbreviated} - ${maxAbbreviated}`);
        }
    }



    function abbreviatePrice(value) {
        if (value >= 1000000) {
            return `£${(value / 1000000).toFixed(1)}m`;
        } else if (value >= 10000) {
            return `£${(value / 1000).toFixed(0)}k`;
        } else {
            return `£${value.toLocaleString()}`;
        }
    }

    function updatePriceTrigger(sliderType) {
        let minValue, maxValue, triggerElement;

        if (sliderType === 'sales') {
            minValue = jQuery("#minValueSales").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueSales").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price');
        } else {
            minValue = jQuery("#minValueLettings").text().replace(/[^0-9.]/g, '');
            maxValue = jQuery("#maxValueLettings").text().replace(/[^0-9.]/g, '');
            triggerElement = jQuery('.trigger--price');
        }

        minValue = parseInt(minValue);
        maxValue = parseInt(maxValue);

        // Check if min and max values are default (e.g., minValue is 0 and maxValue is the slider's max)
        const isDefaultRange = (sliderType === 'sales' && minValue === 0 && maxValue === 3500000) ||
            (sliderType === 'lettings' && minValue === 0 && maxValue === 5000);

        if (isDefaultRange && sliderType === 'sales') {
            triggerElement.text('Price');
        } else if (isDefaultRange && sliderType === 'lettings') {
            triggerElement.text('Rent');
        } else {
            const minAbbreviated = abbreviatePrice(minValue);
            const maxAbbreviated = abbreviatePrice(maxValue);
            triggerElement.text(`${minAbbreviated} - ${maxAbbreviated}`);
        }
    }

    function getSalesStepValue(currentValue) {
        if (currentValue < 300000) {
            return 10000;
        } else if (currentValue < 500000) {
            return 25000;
        } else if (currentValue < 1000000) {
            return 50000;
        } else if (currentValue < 3000000) {
            return 100000;
        } else {
            return 500000;
        }
    }

    function updateSliderValues(sliderType, minValue, maxValue) {
        if (sliderType === 'commercial_sales') {
            document.querySelector("#commercial_minimum_price_input").value = minValue;
            document.querySelector("#commercial_maximum_price_input").value = maxValue;
        } else if (sliderType === 'commercial_lettings') {
            document.querySelector("#commercial_minimum_rent_input").value = minValue;
            document.querySelector("#commercial_maximum_rent_input").value = maxValue;
        } else if (sliderType === 'sales') {
            document.querySelector("#minimum_price_input").value = minValue;
            document.querySelector("#maximum_price_input").value = maxValue;
        } else if (sliderType === 'lettings') {
            document.querySelector("#minimum_rent_input").value = minValue;
            document.querySelector("#maximum_rent_input").value = maxValue;
        }
    }



    function initializeSliderValues(sliderSelector, minValueSelector, maxValueSelector, triggerType) {
        const minValueElement = jQuery(minValueSelector);
        const maxValueElement = jQuery(maxValueSelector);
        const sliderValues = jQuery(sliderSelector).slider("values");

        minValueElement.text("£" + sliderValues[0].toLocaleString());
        maxValueElement.text("£" + sliderValues[1].toLocaleString());

        updateSliderFill(sliderSelector, sliderValues);
        updatePriceTrigger(triggerType);
    }


    jQuery("#sales-slider-range").slider({
        range: true,
        min: 0,
        max: 3500000,
        values: [
            // Prioritize commercial fields if the department is commercial
            parseInt(jQuery("#commercial_minimum_price_input").val()) || parseInt(urlParams.get('commercial_minimum_price')) ||
            // Otherwise use standard fields
            parseInt(jQuery("#minimum_price_input").val()) || parseInt(urlParams.get('minimum_price')) || 0,

            parseInt(jQuery("#commercial_maximum_price_input").val()) || parseInt(urlParams.get('commercial_maximum_price')) ||
            // Otherwise use standard fields
            parseInt(jQuery("#maximum_price_input").val()) || parseInt(urlParams.get('maximum_price')) || 3500000
        ],
        slide: function (event, ui) {
            jQuery("#minValueSales").text("£" + ui.values[0].toLocaleString());
            jQuery("#maxValueSales").text("£" + ui.values[1].toLocaleString());

            const department = urlParams.get('department');

            if (department === 'commercial') {
                // Update commercial price fields if the department is commercial
                jQuery("#commercial_minimum_price_input").val(ui.values[0]);
                jQuery("#commercial_maximum_price_input").val(ui.values[1]);
            } else {
                // Update standard price fields if not commercial
                jQuery("#minimum_price_input").val(ui.values[0]);
                jQuery("#maximum_price_input").val(ui.values[1]);
            }

            updateSliderFill("#sales-slider-range", ui.values);
            updatePriceTrigger('sales');
            jQuery(this).slider('option', 'step', getSalesStepValue(ui.value));
        },
        create: function () {
            // Initialize slider values from hidden fields (respecting both standard and commercial fields)
            initializeSliderValues("#sales-slider-range", "#minValueSales", "#maxValueSales", 'sales');
        }
    });

    function initializeCommercialSaleSliders() {
        if (document.body.classList.contains('page-template-commercial-sale')) {

            jQuery("#sales-slider-range").slider({
                range: true,
                min: 0,
                max: 3500000,
                values: [
                    parseInt(jQuery("#commercial_minimum_price_input").val()) || 0,
                    parseInt(jQuery("#commercial_maximum_price_input").val()) || 3500000
                ],
                slide: function (event, ui) {
                    jQuery("#minValueSales").text("£" + ui.values[0].toLocaleString());
                    jQuery("#maxValueSales").text("£" + ui.values[1].toLocaleString());

                    // Update commercial price fields directly
                    jQuery("#commercial_minimum_price_input").val(ui.values[0]);
                    jQuery("#commercial_maximum_price_input").val(ui.values[1]);

                    updateSliderFill("#sales-slider-range", ui.values);
                    updatePriceTrigger('sales');
                    jQuery(this).slider('option', 'step', getSalesStepValue(ui.value));
                },
                create: function () {
                    initializeSliderValues("#sales-slider-range", "#minValueSales", "#maxValueSales", 'sales');
                }
            });
        }
    }



    jQuery("#lettings-slider-range").slider({
        range: true,
        min: 0,
        max: 5000,
        values: [
            // Prioritize commercial fields if the department is commercial
            parseInt(jQuery("#commercial_minimum_rent_input").val()) || parseInt(urlParams.get('commercial_minimum_rent')) ||
            // Otherwise use standard fields
            parseInt(jQuery("#minimum_rent_input").val()) || parseInt(urlParams.get('minimum_rent')) || 0,

            parseInt(jQuery("#commercial_maximum_rent_input").val()) || parseInt(urlParams.get('commercial_maximum_rent')) ||
            // Otherwise use standard fields
            parseInt(jQuery("#maximum_rent_input").val()) || parseInt(urlParams.get('maximum_rent')) || 5000
        ],
        step: 250,
        slide: function (event, ui) {
            jQuery("#minValueLettings").text("£" + ui.values[0].toLocaleString() + " pcm");
            jQuery("#maxValueLettings").text("£" + ui.values[1].toLocaleString() + " pcm");

            const department = urlParams.get('department');

            if (department === 'commercial') {
                // Update commercial rent fields if the department is commercial
                jQuery("#commercial_minimum_rent_input").val(ui.values[0]);
                jQuery("#commercial_maximum_rent_input").val(ui.values[1]);
            } else {
                // Update standard rent fields if not commercial
                jQuery("#minimum_rent_input").val(ui.values[0]);
                jQuery("#maximum_rent_input").val(ui.values[1]);
            }

            updateSliderFill("#lettings-slider-range", ui.values);
            updatePriceTrigger('lettings');
        },
        create: function () {
            // Initialize slider values from hidden fields (respecting both standard and commercial fields)
            initializeSliderValues("#lettings-slider-range", "#minValueLettings", "#maxValueLettings", 'lettings');
        }
    });

    function initializeCommercialLettingSliders() {
        if (document.body.classList.contains('page-template-commercial-letting')) {
            jQuery("#lettings-slider-range").slider({
                range: true,
                min: 0,
                max: 5000,
                values: [
                    parseInt(jQuery("#commercial_minimum_rent_input").val()) || 0,
                    parseInt(jQuery("#commercial_maximum_rent_input").val()) || 5000
                ],
                step: 250,
                slide: function (event, ui) {
                    jQuery("#minValueLettings").text("£" + ui.values[0].toLocaleString() + " pcm");
                    jQuery("#maxValueLettings").text("£" + ui.values[1].toLocaleString() + " pcm");

                    // Update commercial rent fields directly
                    jQuery("#commercial_minimum_rent_input").val(ui.values[0]);
                    jQuery("#commercial_maximum_rent_input").val(ui.values[1]);

                    updateSliderFill("#lettings-slider-range", ui.values);
                    updatePriceTrigger('lettings');
                },
                create: function () {
                    initializeSliderValues("#lettings-slider-range", "#minValueLettings", "#maxValueLettings", 'lettings');
                }
            });
        }
    }





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

    toggleSliders();

    jQuery('#_parent_department_sales, #_parent_department_lettings').change(toggleSliders);

    function setupDropdowns() {
        document.querySelectorAll('.search-form-control--dropdown, .search-form-control--checkboxes').forEach(dropdownControl => {
            dropdownControl.addEventListener('click', function (event) {
                const dropdown = this.querySelector('.search-form-dropdown');

                if (event.target.tagName === 'INPUT' && event.target.type === 'range') {
                    return;
                }

                dropdown.classList.toggle('open');
            });
        });

        for (const option of document.querySelectorAll('.search-form-dropdown--option input[type="radio"]')) {
            option.addEventListener('change', function () {
                const selectedOption = this.closest('.search-form-dropdown--option');
                const dropdown = this.closest('.search-form-dropdown');
                dropdown.querySelector('.search-form-dropdown--trigger').textContent = selectedOption.textContent.trim();

                selectedOption.parentNode.querySelectorAll('.search-form-dropdown--option.selected').forEach(opt => {
                    opt.classList.remove('selected');
                });
                selectedOption.classList.add('selected');

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

    setupDropdowns();
    setupCheckboxes();

    function closeDropdownsOnClickOutside() {
        window.addEventListener('click', function (e) {
            const dropdowns = document.querySelectorAll('.search-form-dropdown');

            dropdowns.forEach(dropdown => {
                const isClickInside = dropdown.contains(e.target);

                if (!isClickInside) {
                    dropdown.classList.remove('open');
                }
            });
        });
    }

    closeDropdownsOnClickOutside();

    // Ensure that sliders and input fields are updated correctly on page load
    function initializePriceAndRentFields() {
        // First, set the hidden input fields from the URL parameters
        updatePriceAndRentFields();

        // Then, update sliders with the values from the input fields
        updateSlidersAndInputsFromUrl('sales');
        updateSlidersAndInputsFromUrl('lettings');
        updateSlidersAndInputsFromUrl('commercial_sales');
        updateSlidersAndInputsFromUrl('commercial_lettings');
    }




    initializePriceAndRentFields();


    const locationInput = document.getElementById('address_keyword');
    if (locationInput) {
        const autocomplete = new google.maps.places.Autocomplete(locationInput, {
            types: ['(regions)'],
            componentRestrictions: { country: 'uk' }
        });

        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
        });
    }

    function markLastVisibleControl() {
        setTimeout(function () {
            const controls = document.querySelectorAll('.search-form-control');
            let lastVisibleControl = null;

            controls.forEach(function (control) {
                const style = window.getComputedStyle(control);
                if (
                    style.display !== 'none' &&
                    style.visibility !== 'hidden' &&
                    control.offsetParent !== null &&
                    !control.classList.contains('search-form-control--submit')
                ) {
                    lastVisibleControl = control;
                }
            });

            controls.forEach(control => {
                control.classList.remove('last-visible');
            });

            if (lastVisibleControl) {
                lastVisibleControl.classList.add('last-visible');
            }
        }, 300);
    }

    markLastVisibleControl();

    if (document.body.classList.contains("post-type-archive-property")) {
        const listViewTrigger = document.querySelector(".view--list-view");
        const gridViewTrigger = document.querySelector(".view--grid-view");
        const searchResultsContainer = document.querySelector(".search-results");

        const savedView = localStorage.getItem('viewMode');

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

        listViewTrigger.addEventListener("click", function (event) {
            event.preventDefault();
            searchResultsContainer.classList.add("list-view");
            searchResultsContainer.classList.remove("grid-view");
            localStorage.setItem('viewMode', 'list');

            listViewTrigger.classList.add("active");
            gridViewTrigger.classList.remove("active");
        });

        gridViewTrigger.addEventListener("click", function (event) {
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
        includeSoldStcCheckbox.addEventListener('change', function () {
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

    // Form submission logic to remove empty or irrelevant parameters
    jQuery('form').on('submit', function () {
        // Remove address_keyword if empty
        if (!jQuery('input[name="address_keyword"]').val()) {
            jQuery('input[name="address_keyword"]').removeAttr('name');
        }

        // Remove radius if not selected
        if (!jQuery('input[name="radius"]:checked').val()) {
            jQuery('input[name="radius"]').removeAttr('name');
        }

        // Remove property_type[] or commercial_property_type[] if "Show All" is selected
        const department = urlParams.get('department');
        const propertyTypeField = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';

        if (jQuery(`${propertyTypeField}[value=""]`).is(':checked')) {
            jQuery(propertyTypeField).removeAttr('name');
        }

        // Check the parent department toggle
        if (jQuery('#_parent_department_sales').is(':checked')) {
            // If Sales is selected, remove the rent fields (standard and commercial)
            jQuery("#minimum_rent_input").removeAttr('name');
            jQuery("#maximum_rent_input").removeAttr('name');
            jQuery("#commercial_minimum_rent_input").removeAttr('name');
            jQuery("#commercial_maximum_rent_input").removeAttr('name');
        }

        if (jQuery('#_parent_department_lettings').is(':checked')) {
            // If Lettings is selected, remove the price fields (standard and commercial)
            jQuery("#minimum_price_input").removeAttr('name');
            jQuery("#maximum_price_input").removeAttr('name');
            jQuery("#commercial_minimum_price_input").removeAttr('name');
            jQuery("#commercial_maximum_price_input").removeAttr('name');
        }

        // Remove department if not selected or Show All
        if (!jQuery('input[name="department"]').val()) {
            jQuery('input[name="department"]').removeAttr('name');
        }

        // If department is commercial, remove standard fields
        if (department === 'commercial') {
            jQuery('input[name="minimum_price"]').removeAttr('name');
            jQuery('input[name="maximum_price"]').removeAttr('name');
            jQuery('input[name="minimum_rent"]').removeAttr('name');
            jQuery('input[name="maximum_rent"]').removeAttr('name');
        } else {
            // If not commercial, remove commercial fields
            jQuery('input[name="commercial_minimum_price"]').removeAttr('name');
            jQuery('input[name="commercial_maximum_price"]').removeAttr('name');
            jQuery('input[name="commercial_minimum_rent"]').removeAttr('name');
            jQuery('input[name="commercial_maximum_rent"]').removeAttr('name');
        }

        // **NEW: Handling for page-template-commercial-sale**
        if (document.body.classList.contains('page-template-commercial-sale')) {
            // We are on a commercial sale page, so remove standard pricing fields and retain commercial pricing fields
            jQuery('input[name="minimum_price"]').removeAttr('name');
            jQuery('input[name="maximum_price"]').removeAttr('name');

            // Ensure commercial pricing fields are retained
            jQuery("#commercial_minimum_price_input").attr('name', 'commercial_minimum_price');
            jQuery("#commercial_maximum_price_input").attr('name', 'commercial_maximum_price');

            // Remove commercial rent fields as they are irrelevant on this page
            jQuery("#commercial_minimum_rent_input").removeAttr('name');
            jQuery("#commercial_maximum_rent_input").removeAttr('name');
        }

        // **NEW: Handling for page-template-commercial-letting**
        if (document.body.classList.contains('page-template-commercial-letting')) {
            // We are on a commercial letting page, so remove standard rent fields and retain commercial rent fields
            jQuery('input[name="minimum_rent"]').removeAttr('name');
            jQuery('input[name="maximum_rent"]').removeAttr('name');

            // Ensure commercial rent fields are retained
            jQuery("#commercial_minimum_rent_input").attr('name', 'commercial_minimum_rent');
            jQuery("#commercial_maximum_rent_input").attr('name', 'commercial_maximum_rent');

            // Remove commercial pricing fields as they are irrelevant on this page
            jQuery("#commercial_minimum_price_input").removeAttr('name');
            jQuery("#commercial_maximum_price_input").removeAttr('name');
        }
    });



    // Function to update the label text for Sold STC based on department toggle
    function updateSoldStcLabel() {
        const stcLabel = document.querySelector('.stc-checkbox-control + span');
        const stcCheckbox = document.querySelector('.stc-checkbox-control');

        // Check if the checkbox exists on the page before proceeding
        if (stcCheckbox && stcLabel) {
            if (jQuery('#_parent_department_lettings').is(':checked')) {
                stcLabel.textContent = 'Include Let Properties';
            } else {
                stcLabel.textContent = 'Include Under Offer, Sold STC';
            }
        }
    }


    // Call the function to update the label text on page load based on the initial state
    updateSoldStcLabel();

    // Listen for changes to the department radio buttons
    jQuery('#_parent_department_sales, #_parent_department_lettings').change(updateSoldStcLabel);

    jQuery('.filter-draw-trigger').on('click', function () {
        // Toggle the 'open' class on the filter draw
        jQuery('.search-form-control--filter-draw').toggleClass('open');
        jQuery('input.search-form-control--submit').toggleClass('drawer-open');

        // Toggle visibility of icons inside the trigger
        jQuery('.filter-draw-trigger .icon_open').toggle(); // Toggle icon_open visibility
        jQuery('.filter-draw-trigger .icon_close').toggle(); // Toggle icon_close visibility
    });

    // Ensure the initial state of icons
    jQuery('.filter-draw-trigger .icon_close').hide(); // Hide icon_close initially
    initializeCommercialSaleSliders(); // For commercial sale pages
    initializeCommercialLettingSliders(); // For commercial letting pages
});