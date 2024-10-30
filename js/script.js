// script.js

// Mobile Menu Toggle
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelector('.nav-links');

navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('show-links');
});

// Smooth Scrolling for Navigation Links
const navItems = document.querySelectorAll('nav ul li a');

navItems.forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href").substring(1);
        const targetElement = document.getElementById(targetId);
        window.scrollTo({
            top: targetElement.offsetTop - 50, // Adjust this value based on your header height
            behavior: "smooth"
        });
    });
});

// Form Validation (Contact Page)
const contactForm = document.getElementById('contact-form');

if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        const errorMessage = document.querySelector('.error-message');

        if (name === "" || email === "" || message === "") {
            errorMessage.textContent = "All fields are required!";
            errorMessage.style.color = "red";
        } else if (!validateEmail(email)) {
            errorMessage.textContent = "Please enter a valid email address!";
            errorMessage.style.color = "red";
        } else {
            errorMessage.textContent = "";
            contactForm.submit(); // Submit the form if everything is valid
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
}

// Optional: Image Slideshow for Projects
let slideIndex = 0;

if (document.querySelector('.slideshow')) {
    showSlides();

    function showSlides() {
        const slides = document.querySelectorAll('.mySlides');
        slides.forEach(slide => slide.style.display = "none");

        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 5000); // Change slide every 5 seconds
    }
}