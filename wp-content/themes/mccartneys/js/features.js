document.addEventListener("DOMContentLoaded", function () {
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


    // Add more conditions here as we go

    // Set the value of the form field
    const departmentField = document.querySelector('select[name="department"]');
    if (departmentField) {
        departmentField.value = departmentValue;
    }

    // Set a delay before identifying the last visible .control div so that PH functions can run and hide the relevant fields
    setTimeout(function () {
        const controls = document.querySelectorAll('.control');
        let lastVisibleControl = null;

        controls.forEach(function (control) {
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