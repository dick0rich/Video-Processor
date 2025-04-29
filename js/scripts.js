document.addEventListener('DOMContentLoaded', function() {
    console.log('Video Processor site loaded');
    
    // Initialize any interactive elements
    initScrollAnimation();
    initFormValidation();
    initSmoothScroll();
});

/**
 * Initializes scroll animations for elements
 */
function initScrollAnimation() {
    // Simple scroll animation for feature cards
    const featureCards = document.querySelectorAll('.feature-card');
    const stepCards = document.querySelectorAll('.step-card');
    
    // Check if Intersection Observer is supported
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        
        // Observe feature cards
        featureCards.forEach(card => {
            observer.observe(card);
        });
        
        // Observe step cards
        stepCards.forEach(card => {
            observer.observe(card);
        });
    }
}

/**
 * Client-side form validation
 */
function initFormValidation() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            let isValid = true;
            
            // Get form fields
            const nameField = document.getElementById('name');
            const emailField = document.getElementById('email');
            const messageField = document.getElementById('message');
            
            // Validate name (not empty)
            if (!nameField.value.trim()) {
                showError(nameField, 'Please enter your name');
                isValid = false;
            } else {
                clearError(nameField);
            }
            
            // Validate email (not empty and valid format)
            if (!emailField.value.trim()) {
                showError(emailField, 'Please enter your email');
                isValid = false;
            } else if (!isValidEmail(emailField.value.trim())) {
                showError(emailField, 'Please enter a valid email');
                isValid = false;
            } else {
                clearError(emailField);
            }
            
            // Validate message (not empty)
            if (!messageField.value.trim()) {
                showError(messageField, 'Please enter your message');
                isValid = false;
            } else {
                clearError(messageField);
            }
            
            // If not valid, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    }
}

/**
 * Check if email is valid
 * @param {string} email - The email to validate
 * @returns {boolean} - True if email is valid
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * Display error message for a form field
 * @param {HTMLElement} field - The field with error
 * @param {string} message - Error message to display
 */
function showError(field, message) {
    // Clear any existing error
    clearError(field);
    
    // Add error class to the field
    field.classList.add('is-invalid');
    
    // Create error message element
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    // Insert error message after the field
    field.parentNode.appendChild(errorDiv);
}

/**
 * Clear error message for a form field
 * @param {HTMLElement} field - The field to clear error
 */
function clearError(field) {
    field.classList.remove('is-invalid');
    
    // Remove any existing error message
    const errorMessage = field.parentNode.querySelector('.invalid-feedback');
    if (errorMessage) {
        errorMessage.remove();
    }
}

/**
 * Initialize smooth scrolling for navigation links
 */
function initSmoothScroll() {
    // Get all links that start with #
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // If it's just # or the element doesn't exist, don't do anything
            if (href === '#' || !document.querySelector(href)) {
                return;
            }
            
            e.preventDefault();
            
            const targetEl = document.querySelector(href);
            const offsetTop = targetEl.getBoundingClientRect().top + window.pageYOffset;
            
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        });
    });
}

/**
 * Dynamically adjust navbar on scroll
 */
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('shadow');
    } else {
        navbar.classList.remove('shadow');
    }
});
