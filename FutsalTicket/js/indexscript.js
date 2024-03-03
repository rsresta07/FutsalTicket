// Check if the user is logged in
const isLoggedIn = true; // Replace with your logic to check if the user is logged in

// Add event listener to the window load event
window.addEventListener('load', function() {
  // Check if the user is logged in
  if (isLoggedIn) {
    // User is logged in, show the user profile icon
    const userProfileIcon = document.createElement('a');
    userProfileIcon.href = 'php/profile.php'; // Replace with the actual URL of the user profile page
    userProfileIcon.innerHTML = '<img src="img/user-icon.png" alt="User Profile">'; // Replace with the actual path to the user profile icon image
    document.querySelector('nav').appendChild(userProfileIcon);
  }
});
