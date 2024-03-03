function validateRegistrationForm() {
  var username = document.getElementById('username').value;
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone').value;
  var password = document.getElementById('pass').value;
  var confirmPassword = document.getElementById('repass').value;

  // Define the regular expressions for validation
  var usernameRegex = /^[^0-9][^.*]{4,}$/;
  var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var phoneRegex = /^[0-9]{10}$/;

  // Validate username
  if (!usernameRegex.test(username)) {
    alert("Username should be at least 4 characters long, should not start with a number, and should not contain '.' or '*'.");
    return false;
  }

  // Validate password
  if (!passwordRegex.test(password)) {
    alert("Password should be at least 8 characters long, contain at least one capital letter, one small letter, one unique character, and one number.");
    return false;
  }

  // Validate confirm password
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  // Validate email
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  // Validate phone number
  if (!phoneRegex.test(phone)) {
    alert("Please enter a valid 10-digit phone number.");
    return false;
  }

  // Add validation rules for other form fields (name) if needed

  return true;
}
