// admin.js

const adminLoginForm = document.getElementById('admin-login-form');
const errorMessage = document.querySelector('.error-message');

adminLoginForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if (username === "" || password === "") {
        errorMessage.textContent = "Both fields are required!";
    } else if (username === "admin" && password === "admin123") {
        // Simulate a successful login (replace with actual authentication logic)
        window.location.href = "admin-dashboard.html";  // Redirect to admin dashboard
    } else {
        errorMessage.textContent = "Invalid username or password!";
    }
});

// admin.js

// Simulate logging out by redirecting to the admin login page
document.querySelector('a[href="admin.html"]').addEventListener('click', function(e) {
    e.preventDefault();
    // You can add a confirmation here
    window.location.href = 'admin.html';
});