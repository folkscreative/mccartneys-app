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