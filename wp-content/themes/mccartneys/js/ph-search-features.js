document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

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

    // Function to set form field values based on URL parameters
    function setFieldValueFromUrl(paramName, fieldSelector) {
        const paramValue = urlParams.get(paramName);
        if (paramValue) {
            const field = document.querySelector(fieldSelector);
            if (field) {
                field.value = paramValue;
            }
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
    function setPropertyTypeFromUrl(department) {
        const paramName = department === 'commercial' ? 'commercial_property_type[]' : 'property_type[]';
        const fieldSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';

        setCheckboxesFromUrl(paramName, fieldSelector);
    }

    // Function to handle checkbox changes for property type or commercial property type
    function handleCheckboxChange(department) {
        const fieldSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';
        const showAllCheckboxSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"][value=""]' : 'input[name="property_type[]"][value=""]';

        const checkboxes = document.querySelectorAll(fieldSelector);
        const showAllCheckbox = document.querySelector(showAllCheckboxSelector);
        let selectedCount = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked && checkbox.value !== '') {
                selectedCount++;
            }
        });

        if (selectedCount > 0) {
            showAllCheckbox.checked = false;
        } else {
            showAllCheckbox.checked = true;
        }

        updateTriggerText(selectedCount);
    }

    // Call this function based on the department
    function initializePropertyTypeLogic() {
        const department = urlParams.get('department');
        setPropertyTypeFromUrl(department);

        const fieldSelector = department === 'commercial' ? 'input[name="commercial_property_type[]"]' : 'input[name="property_type[]"]';
        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.value === "") {
                    document.querySelectorAll(fieldSelector).forEach(cb => {
                        if (cb.value !== "") {
                            cb.checked = false;
                        }
                    });
                    handleCheckboxChange(department);
                } else {
                    handleCheckboxChange(department);
                }
                this.blur();
                this.focus();
            });
        });

        handleCheckboxChange(department);
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

    // Handle the property type dropdown
    function setCheckboxesFromUrl(paramName, fieldSelector) {
        const paramValues = urlParams.getAll(paramName);
        let selectedCount = 0;

        document.querySelectorAll(fieldSelector).forEach(checkbox => {
            if (paramValues.includes(checkbox.value)) {
                checkbox.checked = true;
                if (checkbox.value !== '') {
                    selectedCount++;
                }
            } else if (checkbox.value === '') {
                checkbox.checked = selectedCount === 0;
            } else {
                checkbox.checked = false;
            }
        });

        updateTriggerText(selectedCount);
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
        } else if (jQuery('#_parent_department_lettings').is(':checked')) {
            salesSlider.hide();
            lettingsSlider.show();
            updatePriceTrigger('lettings');
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

        const minAbbreviated = abbreviatePrice(minValue);
        const maxAbbreviated = abbreviatePrice(maxValue);

        triggerElement.text(`${minAbbreviated} - ${maxAbbreviated}`);
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
        max: 10000000,
        values: [parseInt(urlParams.get('minimum_price')) || 0, parseInt(urlParams.get('maximum_price')) || 10000000],
        slide: function(event, ui) {
            jQuery("#minValueSales").text("£" + ui.values[0].toLocaleString());
            jQuery("#maxValueSales").text("£" + ui.values[1].toLocaleString());
            jQuery("#minimum_price_input").val(ui.values[0]);
            jQuery("#maximum_price_input").val(ui.values[1]);
            updateSliderFill("#sales-slider-range", ui.values);
            updatePriceTrigger('sales');
            jQuery(this).slider('option', 'step', getSalesStepValue(ui.value));
        },
        create: function() {
            initializeSliderValues("#sales-slider-range", "#minValueSales", "#maxValueSales", 'sales');
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
            updatePriceTrigger('lettings');
        },
        create: function() {
            initializeSliderValues("#lettings-slider-range", "#minValueLettings", "#maxValueLettings", 'lettings');
        }
    });

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

    closeDropdownsOnClickOutside();

    const locationInput = document.getElementById('address_keyword');
    if (locationInput) {
        const autocomplete = new google.maps.places.Autocomplete(locationInput, {
            types: ['(regions)'],
            componentRestrictions: { country: 'uk' }
        });

        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
        });
    }

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

        listViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("list-view");
            searchResultsContainer.classList.remove("grid-view");
            localStorage.setItem('viewMode', 'list');

            listViewTrigger.classList.add("active");
            gridViewTrigger.classList.remove("active");
        });

        gridViewTrigger.addEventListener("click", function(event) {
            event.preventDefault();
            searchResultsContainer.classList.add("grid-view");
            searchResultsContainer.classList.remove("list-view");
            localStorage.setItem('viewMode', 'grid');

            gridViewTrigger.classList.add("active");
            listViewTrigger.classList.remove("active");
        });
    }

    const includeSoldStcCheckbox = document.querySelector('.stc-checkbox-control');

    if (includeSoldStcCheckbox) {
        includeSoldStcCheckbox.addEventListener('change', function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (includeSoldStcCheckbox.checked) {
                urlParams.set('include_sold_stc', '1');
            } else {
                urlParams.delete('include_sold_stc');
            }

            const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
            window.location.href = newUrl;
        });
    }

    jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = jQuery(e.target).attr('href');
        var $slider = jQuery(target).find('.inner-tabs.pr ul.properties');

        if ($slider.length > 0) {
            $slider.slick('refresh');
        }
    });

    // Form submission logic to remove empty or irrelevant parameters
    jQuery('form').on('submit', function() {
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

        // Remove minimum_rent and maximum_rent if Sales is selected
        if (jQuery('#_parent_department_sales').is(':checked')) {
            jQuery("#minimum_rent_input").removeAttr('name');
            jQuery("#maximum_rent_input").removeAttr('name');
        }

        // Remove minimum_price and maximum_price if Lettings is selected
        if (jQuery('#_parent_department_lettings').is(':checked')) {
            jQuery("#minimum_price_input").removeAttr('name');
            jQuery("#maximum_price_input").removeAttr('name');
        }

        // Remove department if not selected or Show All
        if (!jQuery('input[name="department"]').val()) {
            jQuery('input[name="department"]').removeAttr('name');
        }
    });

    // Function to update the label text for Sold STC based on department toggle
    function updateSoldStcLabel() {
        const stcLabel = document.querySelector('.stc-checkbox-control + span');
        if (jQuery('#_parent_department_lettings').is(':checked')) {
            stcLabel.textContent = 'Include Let Properties';
        } else {
            stcLabel.textContent = 'Include Under Offer, Sold STC';
        }
    }

    // Call the function to update the label text on page load based on the initial state
    updateSoldStcLabel();

    // Listen for changes to the department radio buttons
    jQuery('#_parent_department_sales, #_parent_department_lettings').change(updateSoldStcLabel);
});