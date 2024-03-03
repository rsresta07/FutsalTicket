// Get the booking details from the URL parameters
console.log (window.location.search);
const urlParams = new URLSearchParams(window.location.search);
const bookingDate = urlParams.get('booking_date');
const bookingTime = urlParams.get('booking_time');
const bookingField = urlParams.get('selected_field');

// Update the HTML elements with the booking details
document.getElementById('booking-date').textContent = bookingDate;
document.getElementById('booking-time').textContent = bookingTime;
document.getElementById('booking-field').textContent = bookingField;
