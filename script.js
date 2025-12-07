
$(document).ready(function () {
    // Check if running via file protocol
    if (window.location.protocol === 'file:') {
        alert("⚠️ IMPORTANT: You are opening this file directly!\n\nPHP will NOT work in this mode.\n\nPlease open your browser and type: http://localhost/booking.html");
    }

    // Helper to show error message
    function showError(element, message) {
        // Remove existing error
        $(element).next('.error').remove();
        // Append new error span
        $('<span class="error">' + message + '</span>').insertAfter(element);
    }
    function clearError(element) {
        $(element).next('.error').remove();
    }

    $('#rentalForm').on('submit', function (e) {
        let isValid = true;

        // Full Name
        const fullname = $('#fullName');
        if (!fullname.val().trim()) {
            showError(fullname, 'Full Name is required');
            isValid = false;
        } else {
            clearError(fullname);
        }

        // Email
        const email = $('#email');
        if (!email.val().trim()) {
            showError(email, 'Email is required');
            isValid = false;
        } else {
            clearError(email);
        }

        // Phone (10 digits)
        const phone = $('#phone');
        const phonePattern = /^[0-9]{10}$/;
        if (!phone.val().trim()) {
            showError(phone, 'Phone Number is required');
            isValid = false;
        }
        else if (!phonePattern.test(phone.val())) {
            showError(phone, 'Phone must be exactly 10 digits');
            isValid = false;
        }
        else {
            clearError(phone);
        }

        // Booking Date
        const date = $('#bookingDate');
        if (!date.val()) {
            showError(date, 'Booking Date is required');
            isValid = false;
        } else {
            clearError(date);
        }

        // Pickup Location
        const location = $('#pickupLocation');
        if (!location.val().trim()) {
            showError(location, 'Pickup Location is required');
            isValid = false;
        } else {
            clearError(location);
        }

        // Car selection
        const car = $('#car');
        if (!car.val()) {
            showError(car, 'Please select a car');
            isValid = false;
        } else {
            clearError(car);
        }

        if (!isValid) {
            e.preventDefault(); // stop form submission
        }
    });
});
